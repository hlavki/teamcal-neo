<?php
if (!defined('VALID_ROOT')) exit('');
/**
 * Model Helper Functions
 *
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2023 by George Lewe
 * @link https://www.lewe.com
 *
 * @package TeamCal Neo
 * @subpackage Helpers
 * @since 3.0.0
 */

// echo '<script type="text/javascript">alert("Debug: ");</script>';

// ---------------------------------------------------------------------------
/**
 * Checks whether an absence type is valid for a given user based on his
 * group memberships
 *
 * @param string $absid Absence ID
 * @param string $username Username
 * 
 * @return boolean True or False indicating success
 */
function absenceIsValidForUser($absid, $username)
{
    global $A, $AG, $P, $U, $UG;
    $isValid = false;

    if (!strlen($username)) {
        //
        // Public
        //
        if (isAllowed('calendaredit')) return true;
    }

    /**
     * Get all groups for the given user
     */
    $userGroups = $UG->getAllForUser($username);

    foreach ($userGroups as $group) {
        if ($AG->isAssigned($absid, $group['groupid'])) $isValid = true;
    }

    return $isValid;
}

// ---------------------------------------------------------------------------
/**
 * Archives a user and all related records
 *
 * @param string $username Username to archive
 */
function archiveUser($username)
{
    global $CONF, $AL, $D, $G, $L, $LOG, $T, $U, $UMSG, $UG, $UO;

    /**
     * Do not archive if username exists in any of the archive table
     */
    if ($U->exists($username, TRUE)) return FALSE;
    if ($UG->exists($username, TRUE)) return FALSE;
    if ($UO->exists($username, TRUE)) return FALSE;
    if ($T->exists($username, TRUE)) return FALSE;
    if ($D->exists($username, TRUE)) return FALSE;
    if ($AL->exists($username, TRUE)) return FALSE;
    if ($UMSG->exists($username, TRUE)) return FALSE;

    /**
     * Get fullname for log
     */
    $U->findByName($username);
    $fullname = trim($U->firstname . " " . $U->lastname);

    /**
     * Archive user
     * Archive memberships
     * Archive options
     * Archive templates
     * Archive daynotes
     * Archive allowances
     * Archive messages
     */
    $U->archive($username);
    $UG->archive($username);
    $UO->archive($username);
    $T->archive($username);
    $D->archive($username);
    $AL->archive($username);
    $UMSG->archive($username);

    /**
     * Delete user from active tables
     */
    deleteUser($username, false, false);

    /**
     * Log this event
     */
    $LOG->log("logUser", $L->checkLogin(), "log_user_archived", $fullname . " (" . $username . ")");

    return true;
}

// ---------------------------------------------------------------------------
/**
 * Deletes all orphaned announcements, meaning those announcements that are
 * not assigned to any user.
 */
function deleteOrphanedMessages()
{
    global $MSG, $UMSG;

    $messages = $MSG->getAll();
    foreach ($messages as $msg) {
        if (!count($UMSG->getAllByMsgId($msg['id']))) $MSG->delete($msg['id']);
    }
}

// ---------------------------------------------------------------------------
/**
 * Deletes a user and all related records
 *
 * @param string $deluser User to delete
 * @param boolean $fromArchive Flag whether to delete from archive tables 
 * @param boolean $sendNotifications Flag whether to send notifications 
 */
function deleteUser($username, $fromArchive = FALSE, $sendNotifications = true)
{
    global $AL, $AV, $CONF, $D, $L, $LOG, $T, $U, $UMSG, $UG, $UO;

    /**
     * Get fullname for log
     */
    $U->findByName($username);
    $fullname = trim($U->firstname . " " . $U->lastname);

    /**
     * Delete user
     * Delete memberships
     * Delete options
     * Delete messages
     * Delete avatars
     * Delete month templates
     * Delete allowances records
     */
    $U->deleteByName($username, $fromArchive);
    $UG->deleteByUser($username, $fromArchive);
    $UO->deleteByUser($username, $fromArchive);
    $UMSG->deleteByUser($username, $fromArchive);
    if ($fromArchive) $AV->delete($username, $UO->read($username, 'avatar'));
    $T->deleteByUser($username, $fromArchive);
    $D->deleteByUser($username, $fromArchive);
    $AL->deleteByUser($username, $fromArchive);

    /**
     * Send notification e-mails
     */
    sendUserEventNotifications("deleted", $username, $U->firstname, $U->lastname);

    /**
     * Log this event
     */
    if ($fromArchive) $LOG->log("logUser", $L->checkLogin(), "log_user_archived_deleted", $fullname . " (" . $username . ")");
    else $LOG->log("logUser", $L->checkLogin(), "log_user_deleted", $fullname . " (" . $username . ")");
}

// ---------------------------------------------------------------------
/**
 * Imports users from a CSV file into the database
 *
 * @param string $file CSV file
 * @param boolean $lock Flag indicating whether to lock the user accounts or not
 * @param boolean $hide Flag indicating whether to hide the user accounts or not
 * 
 * @return boolean Success flag
 */
function importUsersFromCSV($file, $lock = true, $hide = true)
{
    /**
     * The expected columns are:
     * 0        1         2        3
     * username|firstname|lastname|email
     */
    global $LANG, $L, $LOG;
    $UI = new Users;
    $UOI = new UserOption;
    $count_imported = 0;
    $count_skipped = 0;

    $fpointer = fopen($file, "r");

    if ($fpointer) {
        while ($arr = fgetcsv($fpointer, 10 * 1024, ";")) {
            if (is_array($arr) && !empty($arr)) {
                if (count($arr) != 4) {
                    $error = $LANG['uimp_err_col_1'] . $arr[0] . $LANG['uimp_err_col_2'] . count($arr) . $LANG['uimp_err_col_3'];
                    unset($arr);
                    fclose($fpointer);
                    return false;
                } else {
                    if (!$UI->findByName(trim($arr[0])) and $arr[0] != "admin" and preg_match('/^[a-zA-Z0-9]*$/', $arr[0])) {

                        $UI->username = trim($arr[0]);
                        $UI->firstname = $arr[1];
                        $UI->lastname = $arr[2];
                        $UI->email = $arr[3];
                        $UI->password = password_hash("password", PASSWORD_DEFAULT);
                        $UI->role = '2'; // Default role "User"
                        $UI->locked = '0';
                        if ($lock) $UI->locked = '1';
                        $UI->hidden = '0';
                        if ($hide) $UI->hidden = '1';
                        $UI->onhold = '0';
                        $UI->verify = '0';
                        $UI->bad_logins = '0';
                        $UI->grace_start = DEFAULT_TIMESTAMP;
                        $UI->last_login = DEFAULT_TIMESTAMP;
                        $UI->created = date('YmdHis');

                        $UI->create();

                        //
                        // Default user options
                        //
                        $UOI->save($_POST['txt_username'], 'gender', 'male');
                        $UOI->save($_POST['txt_username'], 'avatar', 'default_male.png');
                        $UOI->save($_POST['txt_username'], 'language', 'default');
                        $UOI->save($_POST['txt_username'], 'theme', 'default');

                        $fullname = $UI->firstname . " " . $UI->lastname;
                        $LOG->log("logUser", $L->checkLogin(), "log_csv_import", $UI->username . " (" . $fullname . ")");
                        $count_imported++;
                    } else {
                        $count_skipped++;
                    }
                }
            }
        }
        unset($arr);
        fclose($fpointer);
        return true;
    }
    return false;
}

// ---------------------------------------------------------------------------
/**
 * Checks whether a user is authorized in the active permission scheme
 *
 * @param string $permission Permission to check
 *
 * @return boolean True if allowed, false if not.
 */
function isAllowed($permission = '')
{
    global $C, $L, $P, $UL, $UO;

    $pscheme = $C->read("permissionScheme");

    if (L_USER) {
        /**
         * Someone is logged in.
         * First, check if 2FA required and user hasn't done it yet.
         */
        if (L_USER != 'admin' && $C->read('forceTfa') && !$UO->read(L_USER, 'secret')) {
            return false;
        }
        /**
         * Check permission by role.
         */
        $UL->findByName(L_USER);
        return $P->isAllowed($pscheme, $permission, $UL->role);
    } else {
        /**
         * It's a public user
         */
        return $P->isAllowed($pscheme, $permission, 3);
    }
}

// ---------------------------------------------------------------------------
/**
 * Restores a user and all related records from archive
 *
 * @param string $username Username to restore
 * 
 * @return boolean True or False indicating success
 */
function restoreUser($username)
{
    global $CONF, $AL, $D, $L, $LOG, $T, $U, $UMSG, $UG, $UO;

    /**
     * Do not restore if username exists in any of the active tables
     */
    if ($U->exists($username)) return FALSE;
    if ($UG->exists($username)) return FALSE;
    if ($UO->exists($username)) return FALSE;
    if ($T->exists($username)) return FALSE;
    if ($D->exists($username)) return FALSE;
    if ($AL->exists($username)) return FALSE;
    if ($UMSG->exists($username)) return FALSE;

    /**
     * Get fullname for log
     */
    $U->findByName($username);
    $fullname = trim($U->firstname . " " . $U->lastname);

    /**
     * Restore user
     * Restore memberships
     * Restore options
     * Restore templates
     * Restore daynotes
     * Restore allowances
     * Restore announcements
     */
    $U->restore($username);
    $UG->restore($username);
    $UO->restore($username);
    $T->restore($username);
    $D->restore($username);
    $AL->restore($username);
    $UMSG->restore($username);

    /**
     * Delete user from archive tables
     */
    deleteUser($username, $archive = true, $sendNotifications = false);

    /**
     * Log this event
     */
    $LOG->log("logUser", $L->checkLogin(), "log_user_restored", $fullname . " (" . $username . ")");

    return true;
}
