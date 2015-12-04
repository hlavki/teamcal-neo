<?php
/**
 * regionedit.php
 * 
 * Region edit page controller
 *
 * @category TeamCal Neo 
 * @version 0.3.004
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2015 by George Lewe
 * @link http://www.lewe.com
 * @license
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

// echo "<script type=\"text/javascript\">alert(\"Debug: \");</script>";

/**
 * ========================================================================
 * Check URL params
 */
$RR = new Regions(); // for the profile to be created or updated
if (isset($_GET['id']))
{
   $missingData = FALSE;
   $id = sanitize($_GET['id']);
   if (!$RR->getById($id)) $missingData = TRUE;
}
else
{
   $missingData = TRUE;
}

if ($missingData)
{
   /**
    * URL param fail
    */
   $alertData['type'] = 'danger';
   $alertData['title'] = $LANG['alert_danger_title'];
   $alertData['subject'] = $LANG['alert_no_data_subject'];
   $alertData['text'] = $LANG['alert_no_data_text'];
   $alertData['help'] = $LANG['alert_no_data_help'];
   require (WEBSITE_ROOT . '/controller/alert.php');
   die();
}
else
{
   /**
    * ========================================================================
    * Check if allowed
    */
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
}

/**
 * ========================================================================
 * Load controller stuff
 */
$regionData['id'] = $RR->id;
$regionData['name'] = $RR->name;
$regionData['description'] = $RR->description;

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
   $regionData['id'] = $_POST['hidden_id'];
   $regionData['name'] = $_POST['txt_name'];
   $regionData['description'] = $_POST['txt_description'];
     
   /**
    * Form validation
    */
   $inputError = false;
   if (isset($_POST['btn_regionUpdate']))
   {
      if (!formInputValid('txt_name', 'required|alpha_numeric_dash')) $inputError = true;
      if (!formInputValid('txt_description', 'alpha_numeric_dash_blank')) $inputError = true;
   }
    
   if (!$inputError)
   {
      /**
       * ,--------,
       * | Update |
       * '--------'
       */
      if (isset($_POST['btn_regionUpdate']))
      {
         $RR->name = $_POST['txt_name'];
         $RR->description = $_POST['txt_description'];
          
         $RR->update($_POST['hidden_id']);
          
         /**
          * Log this event
          */
         $LOG->log("logRegion",$L->checkLogin(),"log_region_updated", $RR->name);
          
         /**
          * Success
          */
         $showAlert = TRUE;
         $alertData['type'] = 'success';
         $alertData['title'] = $LANG['alert_success_title'];
         $alertData['subject'] = $LANG['region_alert_edit'];
         $alertData['text'] = $LANG['region_alert_edit_success'];
         $alertData['help'] = '';
         
         /**
          * Load new info for the view
          */
         $regionData['name'] = $RR->name;
         $regionData['description'] = $RR->description;
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
      $alertData['text'] = $LANG['region_alert_save_failed'];
      $alertData['help'] = '';
   }
}

/**
 * ========================================================================
 * Prepare data for the view
 */

$regionData['region'] = array (
   array ( 'prefix' => 'region', 'name' => 'name', 'type' => 'text', 'value' => $regionData['name'], 'maxlength' => '40', 'mandatory' => true, 'error' =>  (isset($inputAlert['name'])?$inputAlert['name']:'') ),
   array ( 'prefix' => 'region', 'name' => 'description', 'type' => 'text', 'value' => $regionData['description'], 'maxlength' => '100', 'error' =>  (isset($inputAlert['description'])?$inputAlert['description']:'') ),
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
