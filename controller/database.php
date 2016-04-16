<?php
/**
 * database.php
 * 
 * Database page controller
 *
 * @category TeamCal Neo 
 * @version 0.5.000
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2016 by George Lewe
 * @link http://www.lewe.com
 * @license
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

// echo "<script type=\"text/javascript\">alert(\"Debug: \");</script>";

//=============================================================================
//
// CHECK PERMISSION
//
if (!isAllowed($CONF['controllers'][$controller]->permission))
{
   $alertData['type'] = 'warning';
   $alertData['title'] = $LANG['alert_alert_title'];
   $alertData['subject'] = $LANG['alert_not_allowed_subject'];
   $alertData['text'] = $LANG['alert_not_allowed_text'];
   $alertData['help'] = $LANG['alert_not_allowed_help'];
   require (WEBSITE_ROOT . '/controller/alert.php');
   die();
}

//=============================================================================
//
// LOAD CONTROLLER RESOURCES
//

//=============================================================================
//
// VARIABLE DEFAULTS
//
$inputAlert = array();

//=============================================================================
//
// PROCESS FORM
//
if (!empty($_POST))
{
   //
   // Sanitize input
   //
   $_POST = sanitize($_POST);
    
   //
   // Form validation
   //
   $inputError = false;
   if (isset($_POST['btn_delete']))
   {
      if (!formInputValid('txt_deleteConfirm', 'required|alpha|equals_string', 'DELETE')) $inputError = true;
   }
    
   if (!$inputError)
   {
      // ,--------,
      // | Delete |
      // '--------'
      if ( isset($_POST['btn_delete']) )
      {
         if ( isset($_POST['chk_delUsers']) )
         {
            //
            // Delete Users (all but admin)
            // Delete User options (all but admin)
            // Delete Daynotes
            // Delete Templates
            // Delete Allowances
            //
            $result = $U->deleteAll();
            $result = $UO->deleteAll();
            $result = $D->deleteAll();
            $result = $T->deleteAll();
            $result = $AL->deleteAll();
            
            //
            // Log this event
            //
            $LOG->log("logDatabase",$L->checkLogin(),"log_db_delete_users");
         }
         
         if ( isset($_POST['chk_delGroups']) )
         {
            //
            // Delete Groups
            // Delete User-Group assignments
            //
            $result = $G->deleteAll();
            $result = $UG->deleteAll();
            
            //
            // Log this event
            //
            $LOG->log("logDatabase",$L->checkLogin(),"log_db_delete_groups");
         }
         
         if ( isset($_POST['chk_delMessages']) )
         {
            //
            // Delete Messages and all User-Message assignments
            //
            $result = $MSG->deleteAll();
            $result = $UMSG->deleteAll();
            
            //
            // Log this event
           //
            $LOG->log("logDatabase",$L->checkLogin(),"log_db_delete_msg");
         }
          
         if ( isset($_POST['chk_delOrphMessages']) )
         {
            //
            // Delete orphaned announcements
            //
            deleteOrphanedMessages();
             
            //
            // Log this event
            //
            $LOG->log("logMessages",$L->checkLogin(),"log_db_delete_msg_orph");
         }
          
         if ( isset($_POST['chk_delPermissions']) )
         {
            $P->deleteAll();
            
            //
            // Log this event
            //
            $LOG->log("logDatabase",$L->checkLogin(),"log_db_delete_perm");
         }
          
         if ( isset($_POST['chk_delLog']) )
         {
            $LOG->deleteAll();
             
            //
            // Log this event
            //
            $LOG->log("logDatabase",$L->checkLogin(),"log_db_delete_log");
         }
         
         if ( isset($_POST['chkDBDeleteArchive']) )
         {
            //
            // Delete archive records
            //
            $U->deleteAll(TRUE);
            $UG->deleteAll(TRUE);
            $UO->deleteAll(TRUE);
            $UMSG->deleteAll(TRUE);
             
            //
            // Log this event
            //
            $LOG->log("logDatabase",$L->checkLogin(),"log_db_delete_archive");
         }
         //
         // Success
         //
         $showAlert = TRUE;
         $alertData['type'] = 'success';
         $alertData['title'] = $LANG['alert_success_title'];
         $alertData['subject'] = $LANG['db_alert_delete'];
         $alertData['text'] = $LANG['db_alert_delete_success'];
         $alertData['help'] = '';
      }
      // ,----------,
      // | Optimize |
      // '----------'
      else if ( isset($_POST['btn_optimize']) )
      {
         //
         // Optimize tables
         //
         $DB->optimizeTables();
         
         //
         // Success
         //
         $showAlert = TRUE;
         $alertData['type'] = 'success';
         $alertData['title'] = $LANG['alert_success_title'];
         $alertData['subject'] = $LANG['db_alert_optimize'];
         $alertData['text'] = $LANG['db_alert_optimize_success'];
         $alertData['help'] = '';
      }
      // ,----------,
      // | Save URL |
      // '----------'
      else if ( isset($_POST['btn_saveURL']) )
      {
         if (filter_var($_POST['txt_dbURL'], FILTER_VALIDATE_URL)) 
         {
            $C->save("dbURL",$_POST['txt_dbURL']); 
            
            //
            // Success
            //
            $showAlert = TRUE;
            $alertData['type'] = 'success';
            $alertData['title'] = $LANG['alert_success_title'];
            $alertData['subject'] = $LANG['db_alert_url'];
            $alertData['text'] = $LANG['db_alert_url_success'];
            $alertData['help'] = '';
         }
         else 
         {
            //
            // Fail
            //
            $showAlert = TRUE;
            $alertData['type'] = 'warning';
            $alertData['title'] = $LANG['alert_warning_title'];
            $alertData['subject'] = $LANG['db_alert_url'];
            $alertData['text'] = $LANG['db_alert_url_fail'];
            $alertData['help'] = '';
            $C->save("dbURL","#");
         }
      }
      // ,----------,
      // | Reset DB |
      // '----------'
      else if ( isset($_POST['btn_reset']) AND $_POST['txt_dbResetString'] == "YesIAmSure" )
      {
         $resetDBSuccess = true;
         
         $myQuery = '';
         $lines = file(WEBSITE_ROOT . '/sql/sample.sql');
            
         // 
         // Loop through each line
         //
         foreach ($lines as $line)
         {
            // Skip if comment
            if (substr($line, 0, 2) == '--' || $line == '') continue;
         
            // Add this line to the current segment
            $myQuery .= $line;
            
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';')
            {
               // Run query
               if ($DB->runQuery($myQuery))
               {
                  // Reset query
                  $myQuery = '';
               }
               else 
               {
                  $resetDBSuccess = false;
               }
            }
         }
          
         if ($resetDBSuccess) 
         {
            //
            // Success
            //
            $showAlert = TRUE;
            $alertData['type'] = 'success';
            $alertData['title'] = $LANG['alert_success_title'];
            $alertData['subject'] = $LANG['db_alert_reset'];
            $alertData['text'] = $LANG['db_alert_reset_success'];
            $alertData['help'] = '';
         }
         else 
         {
            //
            // Fail
            //
            $showAlert = TRUE;
            $alertData['type'] = 'warning';
            $alertData['title'] = $LANG['alert_warning_title'];
            $alertData['subject'] = $LANG['db_alert_reset'];
            $alertData['text'] = $LANG['db_alert_reset_fail'];
            $alertData['help'] = '';
            $C->save("dbURL","#");
         }
      }
   }
   else
   {
      //
      // Input validation failed
      //
      $showAlert = TRUE;
      $alertData['type'] = 'danger';
      $alertData['title'] = $LANG['alert_danger_title'];
      $alertData['subject'] = $LANG['alert_input'];
      $alertData['text'] = $LANG['db_alert_failed'];
      $alertData['help'] = '';
   }
}

//=============================================================================
//
// PREPARE VIEW
//
$viewData['dbURL'] = $C->read('dbURL');

//=============================================================================
//
// SHOW VIEW
//
require (WEBSITE_ROOT . '/views/header.php');
require (WEBSITE_ROOT . '/views/menu.php');
include (WEBSITE_ROOT . '/views/'.$controller.'.php');
require (WEBSITE_ROOT . '/views/footer.php');
?>
