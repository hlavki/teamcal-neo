<?php
/**
 * declination.php
 * 
 * Declination page controller
 *
 * @category TeamCal Neo 
 * @version 0.3.002
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2015 by George Lewe
 * @link http://www.lewe.com
 * @license
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

// echo "<script type=\"text/javascript\">alert(\"Debug: \");</script>";

/**
 * ========================================================================
 * Check if allowed
 */
if (!isAllowed($controller))
{
   $alertData['type'] = 'warning';
   $alertData['title'] = $LANG['alert_alert_title'];
   $alertData['subject'] = $LANG['alert_not_allowed_subject'];
   $alertData['text'] = $LANG['alert_not_allowed_text'];
   $alertData['help'] = $LANG['alert_not_allowed_help'];
   require (WEBSITE_ROOT . '/controller/alert.php');
   die();
}

/**
 * ========================================================================
 * Load controller stuff
 */

/**
 * ========================================================================
 * Initialize variables
 */
$inputAlert = array();

/**
 * ========================================================================
 * Process form
 */
if (!empty($_POST))
{
   /**
    * Sanitize input
    */
   $_POST = sanitize($_POST);
    
   /**
    * Load sanitized form info for the view
    */
   $declData['threshold'] = $_POST['txt_threshold'];
     
   /**
    * Form validation
    */
   $inputError = false;
   if (isset($_POST['btn_save']))
   {
      if ( isset($_POST['chk_absence']) ) 
      {
         if (!formInputValid('txt_threshold', 'max_length|numeric', 2)) $inputError = true;
      }
      
      if ( isset($_POST['chk_before']) ) 
      {
         if (!formInputValid('opt_beforeoption', 'required')) 
         {
            $inputError = true;
         }
         else 
         {
            if ( isset($_POST['opt_beforeoption']) AND $_POST['opt_beforeoption'] == 'date' )
            {
               if (!formInputValid('txt_beforedate', 'required|date')) $inputError = true;
            }
            
         }
      }
      
      if ( isset($_POST['chk_period1']) ) 
      {
         if (!formInputValid('txt_period1start', 'required|date')) $inputError = true;
         if (!formInputValid('txt_period1end', 'required|date')) $inputError = true;
         if (!$inputError)
         {
            $periodstart = str_replace("-","",$_POST['txt_period1start']);
            $periodend   = str_replace("-","",$_POST['txt_period1end']);
            if ($periodend<=$periodstart)
            {
               $inputAlert['period1end'] = sprintf($LANG['alert_input_greater_than'], $LANG['decl_period1start']);
               $inputError = true;               
            }
         }
      }
      
      if ( isset($_POST['chk_period2']) ) 
      {
         if (!formInputValid('txt_period2start', 'required|date')) $inputError = true;
         if (!formInputValid('txt_period2end', 'required|date')) $inputError = true;
         if (!$inputError)
         {
            $periodstart = str_replace("-","",$_POST['txt_period2start']);
            $periodend   = str_replace("-","",$_POST['txt_period2end']);
            if ($periodend<=$periodstart)
            {
               $inputAlert['period2end'] = sprintf($LANG['alert_input_greater_than'], $LANG['decl_period2start']);
               $inputError = true;               
            }
         }
      }
      
      if ( isset($_POST['chk_period3']) ) 
      {
         if (!formInputValid('txt_period3start', 'required|date')) $inputError = true;
         if (!formInputValid('txt_period3end', 'required|date')) $inputError = true;
         if (!$inputError)
         {
            $periodstart = str_replace("-","",$_POST['txt_period3start']);
            $periodend   = str_replace("-","",$_POST['txt_period3end']);
            if ($periodend<=$periodstart)
            {
               $inputAlert['period3end'] = sprintf($LANG['alert_input_greater_than'], $LANG['decl_period3start']);
               $inputError = true;               
            }
         }
      }
      
   }
    
   if (!$inputError)
   {
      /**
       * ,------,
       * | Save |
       * '------'
       */
      if (isset($_POST['btn_save']))
      {
         /**
          * Absence threshold
          */
         if ( isset($_POST['chk_absence']) ) 
         {
            $C->save("declAbsence","1");
            if ( strlen($_POST['txt_threshold']) ) $C->save("declThreshold",$_POST['txt_threshold']); else $C->save("declThreshold","0");
            if ( isset($_POST['opt_base']) ) $C->save("declBase", $_POST['opt_base']); else $C->save("declBase","all");
         }
         else 
         {
            $C->save("declAbsence","0");
         }
         
         /**
          * Before date
          */
         if ( isset($_POST['chk_before']) ) 
         {
            $C->save("declBefore","1");
            if ( isset($_POST['opt_beforeoption']) ) 
            {
               $C->save("declBeforeOption", $_POST['opt_beforeoption']);
               if ($_POST['opt_beforeoption'] == 'today') 
               {
                  $C->save("declBeforeDate", "");
               }
               else
               {
                  $C->save("declBeforeDate", $_POST['txt_beforedate']);
               }
            }
         }
         else
         {
            $C->save("declBefore","0");
         }
          
         /**
          * Period 1
          */
         if ( isset($_POST['chk_period1']) )
         {
            $C->save("declPeriod1","1");
            $C->save("declPeriod1Start", $_POST['txt_period1start']);
            $C->save("declPeriod1End", $_POST['txt_period1end']);
         }
         else
         {
            $C->save("declPeriod1","0");
            $C->save("declPeriod1Start", "");
            $C->save("declPeriod1End", "");
         }
         
         /**
          * Period 2
          */
         if ( isset($_POST['chk_period2']) )
         {
            $C->save("declPeriod2","1");
            $C->save("declPeriod2Start", $_POST['txt_period2start']);
            $C->save("declPeriod2End", $_POST['txt_period2end']);
         }
         else
         {
            $C->save("declPeriod2","0");
            $C->save("declPeriod2Start", "");
            $C->save("declPeriod2End", "");
         }
          
         /**
          * Period 3
          */
         if ( isset($_POST['chk_period3']) )
         {
            $C->save("declPeriod3","1");
            $C->save("declPeriod3Start", $_POST['txt_period3start']);
            $C->save("declPeriod3End", $_POST['txt_period3end']);
         }
         else
         {
            $C->save("declPeriod3","0");
            $C->save("declPeriod3Start", "");
            $C->save("declPeriod3End", "");
         }
          
         /**
          * Scope
          */
         $scope = '';
         if (isset($_POST['sel_roles']) )
         {
            foreach ($_POST['sel_roles'] as $scopeRole)
            {
               $scope .= $scopeRole.',';
            }
         }
         $scope = rtrim($scope,',');
         $C->save("declScope", $scope);
          
         /**
          * Log this event
          */
         $LOG->log("logConfig",$L->checkLogin(),"log_decl_updated");
          
         /**
          * Success
          */
         $showAlert = TRUE;
         $alertData['type'] = 'success';
         $alertData['title'] = $LANG['alert_success_title'];
         $alertData['subject'] = $LANG['decl_alert_save'];
         $alertData['text'] = $LANG['decl_alert_save_success'];
         $alertData['help'] = '';
      }
   }
   else
   {
      /**
       * Input validation failed
       */
      $showAlert = TRUE;
      $alertData['type'] = 'danger';
      $alertData['title'] = $LANG['alert_danger_title'];
      $alertData['subject'] = $LANG['alert_input'];
      $alertData['text'] = $LANG['decl_alert_save_failed'];
      $alertData['help'] = '';
   }
}

/**
 * ========================================================================
 * Prepare data for the view
 */

$declData['declAbsence'] = $C->read('declAbsence');
$declData['declThreshold'] = $C->read('declThreshold');
$declData['declBase'] = $C->read('declBase');

$declData['declBefore'] = $C->read('declBefore');
$declData['declBeforeOption'] = $C->read('declBeforeOption');
$declData['declBeforeDate'] = $C->read('declBeforeDate');

$declData['declPeriod1'] = $C->read('declPeriod1');
$declData['declPeriod1Start'] = $C->read('declPeriod1Start');
$declData['declPeriod1End'] = $C->read('declPeriod1End');

$declData['declPeriod2'] = $C->read('declPeriod2');
$declData['declPeriod2Start'] = $C->read('declPeriod2Start');
$declData['declPeriod2End'] = $C->read('declPeriod2End');

$declData['declPeriod3'] = $C->read('declPeriod3');
$declData['declPeriod3Start'] = $C->read('declPeriod3Start');
$declData['declPeriod3End'] = $C->read('declPeriod3End');

$declData['declNotifyUser'] = $C->read('declNotifyUser');
$declData['declNotifyManager'] = $C->read('declNotifyManager');
$declData['declNotifyDirector'] = $C->read('declNotifyDirector');
$declData['declNotifyAdmin'] = $C->read('declNotifyAdmin');

$declData['declApplyToAll'] = $C->read('declApplyToAll');

$declData['absence'] = array (
   array ( 'prefix' => 'decl', 'name' => 'absence', 'type' => 'check', 'value' => $declData['declAbsence'] ),
   array ( 'prefix' => 'decl', 'name' => 'threshold', 'type' => 'text', 'value' => $declData['declThreshold'], 'maxlength' => '2', 'error' => (isset($inputAlert['threshold'])?$inputAlert['threshold']:'') ),
   array ( 'prefix' => 'decl', 'name' => 'base', 'type' => 'radio', 'values' => array ('all', 'group'), 'value' => $declData['declBase'] ),
);

$declData['before'] = array (
   array ( 'prefix' => 'decl', 'name' => 'before', 'type' => 'check', 'value' => $declData['declBefore'] ),
   array ( 'prefix' => 'decl', 'name' => 'beforeoption', 'type' => 'radio', 'values' => array ('today', 'date'), 'value' => $declData['declBeforeOption'], 'error' => (isset($inputAlert['beforeoption'])?$inputAlert['beforeoption']:'') ),
   array ( 'prefix' => 'decl', 'name' => 'beforedate', 'type' => 'date', 'value' => $declData['declBeforeDate'], 'error' => (isset($inputAlert['beforedate'])?$inputAlert['beforedate']:'') ), 
);

$declData['period1'] = array (
   array ( 'prefix' => 'decl', 'name' => 'period1', 'type' => 'check', 'value' => $declData['declPeriod1'] ),
   array ( 'prefix' => 'decl', 'name' => 'period1start', 'type' => 'date', 'value' => $declData['declPeriod1Start'], 'error' => (isset($inputAlert['period1start'])?$inputAlert['period1start']:'') ),
   array ( 'prefix' => 'decl', 'name' => 'period1end', 'type' => 'date', 'value' => $declData['declPeriod1End'], 'error' => (isset($inputAlert['period1end'])?$inputAlert['period1end']:'') ),
);

$declData['period2'] = array (
   array ( 'prefix' => 'decl', 'name' => 'period2', 'type' => 'check', 'value' => $declData['declPeriod2'] ),
   array ( 'prefix' => 'decl', 'name' => 'period2start', 'type' => 'date', 'value' => $declData['declPeriod2Start'], 'error' => (isset($inputAlert['period2start'])?$inputAlert['period2start']:'') ),
   array ( 'prefix' => 'decl', 'name' => 'period2end', 'type' => 'date', 'value' => $declData['declPeriod2End'], 'error' => (isset($inputAlert['period2end'])?$inputAlert['period2end']:'') ),
);

$declData['period3'] = array (
   array ( 'prefix' => 'decl', 'name' => 'period3', 'type' => 'check', 'value' => $declData['declPeriod3'] ),
   array ( 'prefix' => 'decl', 'name' => 'period3start', 'type' => 'date', 'value' => $declData['declPeriod3Start'], 'error' => (isset($inputAlert['period3start'])?$inputAlert['period3start']:'') ),
   array ( 'prefix' => 'decl', 'name' => 'period3end', 'type' => 'date', 'value' => $declData['declPeriod3End'], 'error' => (isset($inputAlert['period3end'])?$inputAlert['period3end']:'') ),
);

$roles = $RO->getAll();
$currentScope = $C->read('declScope');
$currentScopeArray = explode(',', $currentScope);  
foreach ($roles as $role)
{
   $declData['roles'][] = array('val' => $role['id'], 'name' => $role['name'], 'selected' => (in_array($role['id'],$currentScopeArray))?true:false);
}
$declData['scope'] = array (
   array ( 'prefix' => 'decl', 'name' => 'roles', 'type' => 'listmulti', 'values' => $declData['roles'] ),
);

/**
 * ========================================================================
 * Show view
 */
require (WEBSITE_ROOT . '/views/header.php');
require (WEBSITE_ROOT . '/views/menu.php');
include (WEBSITE_ROOT . '/views/'.$controller.'.php');
require (WEBSITE_ROOT . '/views/footer.php');
?>
