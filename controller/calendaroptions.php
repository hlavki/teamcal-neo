<?php
/**
 * calendaroptions.php
 * 
 * Calendar config page controller
 *
 * @category TeamCal Neo 
 * @version 0.9.005
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2016 by George Lewe
 * @link http://www.lewe.com
 * @license This program cannot be licensed. Redistribution is not allowed. (Not available yet)
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

// echo "<script type=\"text/javascript\">alert(\"Debug: \");</script>";

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

/**
 * ========================================================================
 * Load controller stuff
 */

/**
 * ========================================================================
 * Initialize variables
 */

/**
 * ========================================================================
 * Process form
 */
/**
 * ,-------,
 * | Apply |
 * '-------'
 */
if (isset($_POST['btn_caloptApply']))
{
   /**
    * Display
    */
   $C->save("todayBorderColor", sanitize($_POST['txt_todayBorderColor']));
   $C->save("todayBorderSize", intval($_POST['txt_todayBorderSize']));
   $C->save("pastDayColor", sanitize($_POST['txt_pastDayColor']));
   if (isset($_POST['chk_showWeekNumbers']) && $_POST['chk_showWeekNumbers']) $C->save("showWeekNumbers", "1"); else $C->save("showWeekNumbers", "0");
   $C->save("repeatHeaderCount", intval($_POST['txt_repeatHeaderCount']));
   $C->save("usersPerPage", intval($_POST['txt_usersPerPage']));
   if ( isset($_POST['chk_showAvatars']) && $_POST['chk_showAvatars'] ) $C->save("showAvatars","1"); else $C->save("showAvatars","0");
   if ( isset($_POST['chk_showRoleIcons']) && $_POST['chk_showRoleIcons'] ) $C->save("showRoleIcons","1"); else $C->save("showRoleIcons","0");
   if (isset($_POST['chk_supportMobile']) && $_POST['chk_supportMobile']) $C->save("supportMobile", "1"); else $C->save("supportMobile", "0");
    
   /**
    * Filter
    */
   if (isset($_POST['chk_hideDaynotes']) && $_POST['chk_hideDaynotes']) $C->save("hideDaynotes", "1"); else $C->save("hideDaynotes", "0");
   if (isset($_POST['chk_hideManagers']) && $_POST['chk_hideManagers']) $C->save("hideManagers", "1"); else $C->save("hideManagers", "0");
   if (isset($_POST['chk_hideManagerOnlyAbsences'])) $C->save("hideManagerOnlyAbsences", "1"); else $C->save("hideManagerOnlyAbsences", "0");
   if (isset($_POST['chk_showUserRegion']) && $_POST['chk_showUserRegion']) $C->save("showUserRegion", "1"); else $C->save("showUserRegion", "0");
   if (isset($_POST['chk_markConfidential'])) $C->save("markConfidential", "1"); else $C->save("markConfidential", "0");
    
   /**
    * Options
    */
   if ($_POST['opt_firstDayOfWeek']) $C->save("firstDayOfWeek", $_POST['opt_firstDayOfWeek']);
   if (isset($_POST['chk_satBusi']) && $_POST['chk_satBusi']) $C->save("satBusi", "1"); else $C->save("satBusi", "0");
   if (isset($_POST['chk_sunBusi']) && $_POST['chk_sunBusi']) $C->save("sunBusi", "1"); else $C->save("sunBusi", "0");
   if ($_POST['sel_defregion']) $C->save("defregion", $_POST['sel_defregion']); else $C->save("defregion", "default");
   if ($_POST['opt_defgroupfilter']) $C->save("defgroupfilter", $_POST['opt_defgroupfilter']); else $C->save("defgroupfilter", 'All');
    
   /**
    * Statistics
    */
   if ($_POST['sel_statsScale']) $C->save("statsScale", $_POST['sel_statsScale']); else $C->save("statsScale", "auto");
   $C->save("statsSmartValue",intval($_POST['txt_statsSmartValue']));
    
   /**
    * Summary
    */
   if (isset($_POST['chk_includeSummary']) && $_POST['chk_includeSummary']) $C->save("includeSummary", "1"); else $C->save("includeSummary", "0");
   if (isset($_POST['chk_showSummary']) && $_POST['chk_showSummary']) $C->save("showSummary", "1"); else $C->save("showSummary", "0");
    
   /**
    * Log this event
    */
   $LOG->log("logCalendarOptions", $UL->username, "log_calopt");
   header("Location: index.php?action=".$controller);
}

/**
 * ========================================================================
 * Prepare data for the view
 */
$caloptData['display'] = array (
   array ( 'prefix' => 'calopt', 'name' => 'todayBorderColor', 'type' => 'color', 'value' => $C->read("todayBorderColor"), 'maxlength' => '6' ),
   array ( 'prefix' => 'calopt', 'name' => 'todayBorderSize', 'type' => 'text', 'value' => $C->read("todayBorderSize"), 'maxlength' => '2' ),
   array ( 'prefix' => 'calopt', 'name' => 'pastDayColor', 'type' => 'color', 'value' => $C->read("pastDayColor"), 'maxlength' => '6' ),
   array ( 'prefix' => 'calopt', 'name' => 'showWeekNumbers', 'type' => 'check', 'values' => '', 'value' => $C->read("showWeekNumbers") ),
   array ( 'prefix' => 'calopt', 'name' => 'repeatHeaderCount', 'type' => 'text', 'value' => $C->read("repeatHeaderCount"), 'maxlength' => '4' ),
   array ( 'prefix' => 'calopt', 'name' => 'usersPerPage', 'type' => 'text', 'value' => $C->read("usersPerPage"), 'maxlength' => '4' ),
   array ( 'prefix' => 'calopt', 'name' => 'showAvatars', 'type' => 'check', 'values' => '', 'value' => $C->read("showAvatars") ),
   array ( 'prefix' => 'calopt', 'name' => 'showRoleIcons', 'type' => 'check', 'values' => '', 'value' => $C->read("showRoleIcons") ),
   array ( 'prefix' => 'calopt', 'name' => 'supportMobile', 'type' => 'check', 'values' => '', 'value' => $C->read("supportMobile") ),
   );

$caloptData['filter'] = array (
   array ( 'prefix' => 'calopt', 'name' => 'hideManagers', 'type' => 'check', 'values' => '', 'value' => $C->read("hideManagers") ),
   array ( 'prefix' => 'calopt', 'name' => 'hideDaynotes', 'type' => 'check', 'values' => '', 'value' => $C->read("hideDaynotes") ),
   array ( 'prefix' => 'calopt', 'name' => 'hideManagerOnlyAbsences', 'type' => 'check', 'values' => '', 'value' => $C->read("hideManagerOnlyAbsences") ),
   array ( 'prefix' => 'calopt', 'name' => 'showUserRegion', 'type' => 'check', 'values' => '', 'value' => $C->read("showUserRegion") ),
   array ( 'prefix' => 'calopt', 'name' => 'markConfidential', 'type' => 'check', 'values' => '', 'value' => $C->read("markConfidential") ),
);

$regions = $R->getAllNames();
foreach ($regions as $region)
{
   $caloptData['regionList'][] = array ('val' => $region, 'name' => $region, 'selected' => ($C->read("defregion") == $region)?true:false );
}
$caloptData['options'] = array (
   array ( 'prefix' => 'calopt', 'name' => 'firstDayOfWeek', 'type' => 'radio', 'values' => array ('1', '7'), 'value' => $C->read("firstDayOfWeek") ),
   array ( 'prefix' => 'calopt', 'name' => 'satBusi', 'type' => 'check', 'values' => '', 'value' => $C->read("satBusi") ),
   array ( 'prefix' => 'calopt', 'name' => 'sunBusi', 'type' => 'check', 'values' => '', 'value' => $C->read("sunBusi") ),
   array ( 'prefix' => 'calopt', 'name' => 'defregion', 'type' => 'list', 'values' => $caloptData['regionList'] ),
   array ( 'prefix' => 'calopt', 'name' => 'defgroupfilter', 'type' => 'radio', 'values' => array ('all', 'allbygroup'), 'value' => $C->read("defgroupfilter") ),
);

$statsScale = array (
   array ( 'val' => 'auto', 'name' => $LANG['auto'], 'selected' => ($C->read("statsScale") == 'auto')?true:false ),
   array ( 'val' => 'smart', 'name' => $LANG['smart'], 'selected' => ($C->read("statsScale") == 'smart')?true:false ),
);
$caloptData['stats'] = array (
   array ( 'prefix' => 'calopt', 'name' => 'statsScale', 'type' => 'list', 'values' => $statsScale ),
   array ( 'prefix' => 'calopt', 'name' => 'statsSmartValue', 'type' => 'text', 'value' => $C->read("statsSmartValue"), 'maxlength' => '3' ),
);

$caloptData['summary'] = array (
   array ( 'prefix' => 'calopt', 'name' => 'includeSummary', 'type' => 'check', 'values' => '', 'value' => $C->read("includeSummary") ),
   array ( 'prefix' => 'calopt', 'name' => 'showSummary', 'type' => 'check', 'values' => '', 'value' => $C->read("showSummary") ),
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
