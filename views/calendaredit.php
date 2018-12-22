<?php
/**
 * calendaredit.php
 * 
 * Edit calendar page view
 *
 * @category TeamCal Neo 
 * @version 1.9.011
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2019 by George Lewe
 * @link http://www.lewe.com
 * @license https://georgelewe.atlassian.net/wiki/x/AoC3Ag
 */
if (!defined('VALID_ROOT')) die('No direct access allowed!');
?>

      <!-- ==================================================================== 
      view.editcalendar
      -->
      <div class="container content" style="padding-left: 4px; padding-right: 4px;">
      
         <?php 
         if ($showAlert AND $C->read("showAlerts")!="none")
         { 
            if ( $C->read("showAlerts")=="all" OR 
                 $C->read("showAlerts")=="warnings" AND ($alertData['type']=="warning" OR $alertData['type']=="danger")
               ) 
            {
               echo createAlertBox($alertData);
            }
         } ?>
          
         <?php $tabindex = 1; $colsleft = 1; $colsright = 4;?>
         
         <form  class="bs-example form-control-horizontal" enctype="multipart/form-data" action="index.php?action=<?=$controller?>&amp;month=<?=$viewData['year'].$viewData['month']?>&amp;region=<?=$viewData['regionid']?>&amp;user=<?=$viewData['username']?>" method="post" target="_self" accept-charset="utf-8">

            <input name="hidden_month" type="hidden" class="text" value="<?=$viewData['month']?>">
            <input name="hidden_region" type="hidden" class="text" value="<?=$viewData['regionid']?>">

            <?php 
            if ($viewData['month']==1) 
            {
               $pageBwdYear = $viewData['year'] - 1;
               $pageBwdMonth = '12'; 
               $pageFwdYear = $viewData['year']; 
               $pageFwdMonth = sprintf('%02d', $viewData['month'] + 1); 
            }
            elseif ($viewData['month']==12) 
            {
               $pageBwdYear = $viewData['year']; 
               $pageBwdMonth = sprintf('%02d', $viewData['month'] - 1); 
               $pageFwdYear = $viewData['year'] + 1; 
               $pageFwdMonth = '01'; 
            }
            else 
            {
               $pageBwdYear = $viewData['year']; 
               $pageFwdYear = $viewData['year']; 
               $pageBwdMonth = sprintf('%02d', $viewData['month'] - 1); 
               $pageFwdMonth = sprintf('%02d', $viewData['month'] + 1); 
            }
            ?>
                        
            <div class="page-menu">
               <a class="btn btn-default" href="index.php?action=<?=$controller?>&amp;month=<?=$pageBwdYear.$pageBwdMonth?>&amp;region=<?=$viewData['regionid']?>&amp;user=<?=$viewData['username']?>"><span class="fas fa-angle-double-left"></span></a>
               <a class="btn btn-default" href="index.php?action=<?=$controller?>&amp;month=<?=$pageFwdYear.$pageFwdMonth?>&amp;region=<?=$viewData['regionid']?>&amp;user=<?=$viewData['username']?>"><span class="fas fa-angle-double-right"></span></a>
               <a class="btn btn-default" href="index.php?action=<?=$controller?>&amp;month=<?=$viewData['yearToday'].$viewData['monthToday']?>&amp;region=<?=$viewData['regionid']?>&amp;user=<?=$viewData['username']?>"><?=$LANG['today']?></a>
               <button type="button" class="btn btn-primary" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalPeriod"><?=$LANG['caledit_Period']?></button>
               <button type="button" class="btn btn-primary" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalRecurring"><?=$LANG['caledit_Recurring']?></button>
               <?php if($C->read("showRegionButton")) { ?>
                  <button type="button" class="btn btn-warning" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalSelectRegion"><?=$LANG['region'] . ': ' . $viewData['regionname']?></button>
               <?php } ?>
               <button type="button" class="btn btn-success" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalSelectUser"><?=$LANG['user'] . ': ' . $viewData['fullname']?></button>
               <button type="submit" class="btn btn-primary" tabindex="<?=$tabindex++;?>" name="btn_save"><?=$LANG['btn_save']?></button>
               <button type="button" class="btn btn-danger" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalClearAll"><?=$LANG['btn_clear_all']?></button>
               <?php if ($viewData['supportMobile']) { ?> 
                  <button type="button" class="btn btn-default" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalSelectWidth"><?=$LANG['screen'] . ': ' . $viewData['width']?></button>
               <?php } ?>
               <a href="index.php?action=calendarview" class="btn btn-default pull-right" tabindex="<?=$tabindex++;?>"><?=$LANG['btn_showcalendar']?></a>
            </div>

            <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
               <?php 
               $pageHelp = '';
               if ($C->read('pageHelp')) $pageHelp = '<a href="'.$CONF['controllers'][$controller]->docurl.'" target="_blank" class="pull-right" style="color:inherit;"><i class="fas fa-question-circle fa-lg"></i></a>';
               ?>
               <div class="panel-heading"><i class="<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-header"></i><?=sprintf($LANG['caledit_title'], $viewData['year'], $viewData['month'], $viewData['fullname'])?><?=$pageHelp?></div>
            </div>
            
            <?php if (!$viewData['supportMobile']) 
            {
               $mobilecols = array('full'=>$viewData['dateInfo']['daysInMonth']);
            }
            else 
            {
               switch ($viewData['width'])
               {
                  case '1024plus':
                     $mobilecols = array('full'=>$viewData['dateInfo']['daysInMonth']);
                     break;
                      
                  case '1024':
                     $mobilecols = array('1024'=>25);
                     break;
                     
                  case '800':
                     $mobilecols = array('800'=>17);
                     break;
                         
                  case '640':
                     $mobilecols = array('640'=>14);
                     break;
                         
                  case '480':
                     $mobilecols = array('480'=>9);
                     break;

                  case '400':
                     $mobilecols = array('400'=>7);
                     break;

                  case '320':
                     $mobilecols = array('320'=>5);
                     break;

                  case '240':
                     $mobilecols = array('240'=>3);
                     break;

                  default:
                     $mobilecols = array('full'=>$viewData['dateInfo']['daysInMonth']);
                     break;
               }
            }
            
            foreach ($mobilecols as $key => $cols) 
                        { 
               $days = $viewData['dateInfo']['daysInMonth'];
               $tables = ceil( $days / $cols);
               for ($t=0; $t<$tables; $t++)
               {
                  $daystart = ($t * $cols) + 1;
                  $daysleft = $days - ($cols * $t);
                  if ($daysleft >= $cols) $dayend = $daystart + ($cols - 1);
                  else $dayend = $days;
            ?>
                  <div class="table<?=($viewData['supportMobile'])?$key:'';?>">
                     <table class="table table-bordered month">
                        <thead>
                           <!-- Row: Month name and day numbers -->
                           <tr>
                              <th class="m-monthname"><?=$viewData['dateInfo']['monthname']?> <?=$viewData['dateInfo']['year']?></th>
                              <?php for ($i=$daystart; $i<=$dayend; $i++) { ?> 
                                 <th class="m-daynumber text-center"<?=$viewData['dayStyles'][$i]?>><?=$i?></th>
                              <?php } ?>
                           </tr>
                           
                           <!-- Row: Weekdays -->
                           <tr>
                              <th class="m-label">&nbsp;</th>
                              <?php for ($i=$daystart; $i<=$dayend; $i++) { 
                                 $prop = 'wday'.$i; ?>
                                 <th class="m-weekday text-center"<?=$viewData['dayStyles'][$i]?>><?=$LANG['weekdayShort'][$M->$prop]?></th>
                              <?php } ?>
                           </tr>
                           
                           <?php if ($viewData['showWeekNumbers']) { ?>
                              <!-- Row: Week numbers -->
                              <tr>
                                 <th class="m-label"><?=$LANG['weeknumber']?></th>
                                 <?php for ($i=$daystart; $i<=$dayend; $i++) { 
                                    $prop = 'week'.$i; 
                                    $wprop = 'wday'.$i; ?>
                                    <th class="m-weeknumber text-center<?=(($M->$wprop==$viewData['firstDayOfWeek'])?' first':' inner')?>"><?=(($M->$wprop==$viewData['firstDayOfWeek'])?$M->$prop:'')?></th>
                                 <?php } ?>
                              </tr>
                           <?php } ?>
                           
                           <!-- Row: Daynotes -->
                           <tr>
                              <th class="m-label"><?=$LANG['dn_title']?></th>
                              <?php for ($i=$daystart; $i<=$dayend; $i++) { 
                                 $prop = 'wday'.$i;
                                 if ($D->get($viewData['year'].$viewData['month'].sprintf("%02d",$i), $viewData['username'], $viewData['regionid'], true)) {
                                    $icon = 'sticky-note';
                                    $tooltipColor = ' tooltip-'.$D->color;
                                    $tooltip = ' data-position="tooltip-top" data-toggle="tooltip" data-title="'.$D->daynote.'"';
                                 }
                                 else {
                                    $icon = 'sticky-note-o';
                                    $tooltipColor = '';
                                    $tooltip = '';
                                 }
                                 ?>
                                 <th class="m-weekday text-center"<?=$viewData['dayStyles'][$i]?>>
                                    <a href="index.php?action=daynote&amp;date=<?=$viewData['year'].$viewData['month'].sprintf("%02d",$i)?>&amp;for=<?=$viewData['username']?>&amp;region=<?=$viewData['regionid']?>">
                                       <i class="fas fa-<?=$icon?> text-info<?=$tooltipColor?>"<?=$tooltip?>></i>
                                    </a>
                                 </th>
                              <?php } ?>
                           </tr>
                           
                        </thead>
                        <tbody>
                           
                           <!-- Rows: Current absence -->
                           <tr>
                              <td class="m-label"><?=$LANG['caledit_currentAbsence']?></td>
                              <?php 
                              for ($i=$daystart; $i<=$dayend; $i++) { 
                                 $style = $viewData['dayStyles'][$i];
                                 $icon = '';
                                 if ($abs = $T->getAbsence($viewData['username'], $viewData['year'], $viewData['month'], $i)) 
                                 {
                                    /**
                                     * This is an absence. Get the coloring info.
                                     */
                                    $style = ' style="color: #' . $A->getColor($abs) . '; background-color: #' . $A->getBgColor($abs) . ';';
                                    if ($C->read('symbolAsIcon'))
                                    {
                                       $icon = $A->getSymbol($abs);
                                    }
                                    else
                                    {
                                       $icon = '<span class="'.$A->getIcon($abs).'"></span>';
                                    }
                                    $loopDate = date('Y-m-d', mktime(0, 0, 0, $viewData['month'], $i, $viewData['year']));
                                    if ( $loopDate == $currDate )
                                    {
                                       $style .= 'border-left: ' . $C->read("todayBorderSize") . 'px solid #' . $C->read("todayBorderColor") . ';border-right: ' . $C->read("todayBorderSize") . 'px solid #' . $C->read("todayBorderColor") . ';';
                                    }
                                    $style .= '"';
                                 }
                                 ?>
                                 <td class="m-day text-center"<?=$style?>><?=$icon?></td>
                              <?php } ?>
                           </tr>
                           
                           <!-- Rows ff: Absences -->
                           <?php foreach ($viewData['absences'] as $abs) { 
                              if ( 
                                    $UL->username=='admin' OR
                                    absenceIsValidForUser($abs['id'],$UL->username) AND (
                                       !$abs['manager_only'] OR
                                       ($abs['manager_only'] AND $UG->isGroupManagerOfUser($UL->username, $viewData['username'])) OR
                                       ($abs['manager_only'] AND isAllowed('manageronlyabsences')) OR
                                       ($abs['manager_only'] AND $C->read("managerOnlyIncludesAdministrator") AND $UL->hasRole($UL->username,1)) // Role 1 = Administrator
                                    )
                                 ) { 
                                 ?>
                              <tr>
                                 <td class="m-name"><?=$abs['name']?></td>
                                 <?php 
                                 for ($i=$daystart; $i<=$dayend; $i++) { 
                                    $prop = 'abs'.$i; 
                                    ?>
                                    <td class="m-day text-center"<?=$viewData['dayStyles'][$i]?>><input name="opt_abs_<?=$i?>" type="radio" value="<?=$abs['id']?>"<?=(($T->$prop==$abs['id'])?' checked':'')?>></td>
                                 <?php } ?>
                              </tr>
                           <?php } 
                           } ?>
                           
                           <!-- Last Row: Clear radio button -->
                           <tr>
                              <td class="m-label"><?=$LANG['caledit_clearAbsence']?></td>
                              <?php for ($i=$daystart; $i<=$dayend; $i++) { ?> 
                                 <td class="m-label text-center"><input name="opt_abs_<?=$i?>" type="radio" value="0"></td>
                              <?php } ?>
                           </tr>
                           
                           <?php if ($C->read('takeover') AND $UL->username != $viewData['username']) {?>
                           <!-- Take over row -->
                           <tr>
                              <td class="m-label">Take over</td>
                              <?php for ($i=$daystart; $i<=$dayend; $i++) { ?> 
                                 <td class="m-label text-center"><input name="opt_abs_<?=$i?>" type="radio" value="takeover"></td>
                              <?php } ?>
                           </tr>
                           <?php } ?>
                           
                        </tbody>
                     </table>
                  </div>
               
               <?php } ?>
            <?php } ?>
            
            <!-- Modal: Clear All -->
            <?=createModalTop('modalClearAll', $LANG['modal_confirm'])?>
               <?=sprintf($LANG['caledit_confirm_clearall'], $viewData['year'], $viewData['month'], $viewData['fullname'])?>
               <div class="checkbox">
                  <label><input type="checkbox" name="chk_clearAbsences" tabindex="<?=$tabindex++?>"><strong><?=$LANG['caledit_clearAbsences']?></strong></label>
               </div>
               <?php if (isAllowed($CONF['controllers']['daynote']->permission) OR isAllowed('daynoteglobal')) { ?>
               <div class="checkbox">
                  <label><input type="checkbox" name="chk_clearDaynotes" tabindex="<?=$tabindex++?>"><strong><?=$LANG['caledit_clearDaynotes']?></strong></label>
               </div>
               <?php } ?>
            <?=createModalBottom('btn_clearall', 'success', $LANG['btn_clear_all'])?>
            
            <!-- Modal: Select Region -->
            <?=createModalTop('modalSelectRegion', $LANG['cal_selRegion'])?>
               <select class="form-control" name="sel_region" tabindex="<?=$tabindex++?>">
                  <?php foreach($viewData['regions'] as $reg) { ?>
                     <option value="<?=$reg['id']?>" <?=(($viewData['regionid'] == $reg['id'])?'selected="selected"':'')?>><?=$reg['name']?></option>
                  <?php } ?>
               </select>
            <?=createModalBottom('btn_region', 'success', $LANG['btn_select'])?>
            
            <!-- Modal: Screen Width -->
            <?=createModalTop('modalSelectWidth', $LANG['cal_selWidth'])?>
               <p><?=$LANG['cal_selWidth_comment']?></p>
               <select class="form-control" name="sel_width" tabindex="<?=$tabindex++?>">
                  <?php foreach($LANG['widths'] as $key => $value) { ?>
                     <option value="<?=$key?>"<?=(($viewData['width'] == $key)?' selected="selected"':'')?>><?=$value?></option>
                  <?php } ?>
               </select>
            <?=createModalBottom('btn_width', 'warning', $LANG['btn_select'])?>

            <!-- Modal: Select User -->
            <?=createModalTop('modalSelectUser', $LANG['caledit_selUser'])?>
               <select class="form-control" name="sel_user" tabindex="<?=$tabindex++?>">
                  <?php foreach($viewData['users'] as $usr) { ?>
                     <option  value="<?=$usr['username']?>"<?=(($viewData['username'] == $usr['username'])?' selected="selected"':'')?>><?=$usr['lastfirst']?></option>
                  <?php } ?>
               </select>
            <?=createModalBottom('btn_user', 'success', $LANG['btn_select'])?>
            
            <!-- Modal: Period -->
            <?=createModalTop('modalPeriod', $LANG['caledit_PeriodTitle'])?>
               <div>
                  <div style="width: 60%; float: left; margin-bottom: 20px;">
                     <span class="text-bold"><?=$LANG['caledit_absenceType']?></span><br>
                     <span class="text-normal"><?=$LANG['caledit_absenceType_comment']?></span>
                  </div>
                  <div style="width: 40%; margin-bottom: 20px;">
                     <select class="form-control" name="sel_periodAbsence" tabindex="<?=$tabindex++?>">
                        <?php foreach($viewData['absences'] as $abs) {
                           if( ($abs['manager_only'] AND ($UG->isGroupManagerOfUser($UL->username, $viewData['username']) OR $UL->username=='admin')) OR !$abs['manager_only']) { ?>
                              <option  value="<?=$abs['id']?>"><?=$abs['name']?></option>
                           <?php } 
                        } ?>
                     </select>
                  </div>
               </div>
               <div>&nbsp;</div>
               <div>
                  <div style="width: 60%; float: left; margin-bottom: 20px;">
                     <span class="text-bold"><?=$LANG['caledit_startDate']?></span><br>
                     <span class="text-normal"><?=$LANG['caledit_startDate_comment']?></span>
                  </div>
                  <div style="width: 40%; margin-bottom: 20px;">
                     <input id="periodStart" class="form-control" tabindex="<?=$tabindex++?>" name="txt_periodStart" type="text" maxlength="10" value="">
                     <script>
                        $(function() { 
                           $( "#periodStart" ).datepicker({ 
                              changeMonth: true, 
                              changeYear: true,
                              dateFormat: "yy-mm-dd"
                           }); 
                        });
                        // Make drop downs work in modal dialogs. Needed once on page.
                        var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;
                        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
                        // $confModal.on('hidden', function() {
                        //    $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
                        // });
                        // $confModal.modal({ backdrop : false });
                     </script>
                  </div>
                  <?php if ( isset($inputAlert["periodStart"]) AND strlen($inputAlert["periodStart"]) ) { ?> 
                  <br><div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button><?=$inputAlert['periodStart']?></div>
                  <?php } ?>
               </div>
               <div>&nbsp;</div>
               <div>
                  <div style="width: 60%; float: left; margin-bottom: 20px;">
                     <span class="text-bold"><?=$LANG['caledit_endDate']?></span><br>
                     <span class="text-normal"><?=$LANG['caledit_endDate_comment']?></span>
                  </div>
                  <div style="width: 40%; margin-bottom: 20px;">
                     <input id="periodEnd" class="form-control" tabindex="<?=$tabindex++?>" name="txt_periodEnd" type="text" maxlength="10" value="">
                     <script>
                        $(function() { 
                           $( "#periodEnd" ).datepicker({ 
                              changeMonth: true, 
                              changeYear: true, 
                              dateFormat: "yy-mm-dd"
                           });
                        });
                     </script>
                  </div>
                  <?php if ( isset($inputAlert["periodEnd"]) AND strlen($inputAlert["periodEnd"]) ) { ?> 
                  <br><div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button><?=$inputAlert['periodEnd']?></div>
                  <?php } ?>
               </div>
            <?=createModalBottom('btn_saveperiod', 'success', $LANG['btn_save'])?>

            <!-- Modal: Recurring -->
            <?=createModalTop('modalRecurring', $LANG['caledit_RecurringTitle'])?>
               <div class="col-lg-12" style="margin-bottom:30px;padding-left:0px;">
                  <div class="col-lg-6">
                     <b><?=$LANG['caledit_absenceType']?></b><br>
                     <?=$LANG['caledit_absenceType_comment']?>
                  </div>
                  <div class="col-lg-6">
                     <select class="form-control" name="sel_recurringAbsence" tabindex="<?=$tabindex++?>">
                        <?php foreach($viewData['absences'] as $abs) {
                           if( ($abs['manager_only'] AND ($UG->isGroupManagerOfUser($UL->username, $viewData['username']) OR $UL->username=='admin')) OR !$abs['manager_only']) { ?>
                              <option value="<?=$abs['id']?>"><?=$abs['name']?></option>
                           <?php } 
                        } ?>
                     </select>
                  </div>
               </div>
               <div class="col-lg-12">
                  <b><?=$LANG['caledit_recurrence']?></b><br>
                  <?=$LANG['caledit_recurrence_comment']?>
               </div>
               <div class="col-lg-12">
                  <div class="col-lg-6" style="padding-left:20px;">
                     <div class="checkbox"><input id="monday" name="monday" value="monday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][1]?></div>
                     <div class="checkbox"><input id="tuesday" name="tuesday" value="tuesday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][2]?></div>
                     <div class="checkbox"><input id="wedensday" name="wednesday" value="wednesday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][3]?></div>
                     <div class="checkbox"><input id="thursday" name="thursday" value="thursday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][4]?></div>
                     <div class="checkbox"><input id="friday" name="friday" value="friday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][5]?></div>
                  </div>
                  <div class="col-lg-6" style="padding-left:20px;">
                     <div class="checkbox"><input id="saturday" name="saturday" value="saturday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][6]?></div>
                     <div class="checkbox"><input id="sunday" name="sunday" value="sunday" tabindex="<?=$tabindex++?>" type="checkbox"><?=$LANG['weekdayLong'][7]?></div>
                     <div class="checkbox"><input id="workdays" name="workdays" value="workdays" tabindex="<?=$tabindex++?>" type="checkbox">Mon-Fri</div>
                     <div class="checkbox"><input id="weekends" name="weekends" value="weekends" tabindex="<?=$tabindex++?>" type="checkbox">Sat-Sun</div>
                  </div>
               </div>
               <div>&nbsp;</div>
            <?=createModalBottom('btn_saverecurring', 'success', $LANG['btn_save'])?>
                     
         </form>
            
      </div>      
