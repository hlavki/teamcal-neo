<?php
/**
 * useredit.php
 * 
 * User edit page view
 *
 * @category TeamCal Neo 
 * @version 1.3.002
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2016 by George Lewe
 * @link http://www.lewe.com
 * @license https://georgelewe.atlassian.net/wiki/x/AoC3Ag
 */
if (!defined('VALID_ROOT')) die('No direct access allowed!');
?>

      <!-- ==================================================================== 
      view.useredit
      -->
      <div class="container content">
      
         <div class="col-lg-12">
            <?php 
            if ($showAlert AND $C->read("showAlerts")!="none")
            { 
               if ( $C->read("showAlerts")=="all" OR 
                    $C->read("showAlerts")=="warnings" AND ($alertData['type']=="warning" OR $alertData['type']=="danger")
                  ) 
               {
                  echo createAlertBox($alertData);
               }
            } 
            $tabindex = 1; $colsleft = 8; $colsright = 4;
            ?>
            
            <form  class="bs-example form-control-horizontal" enctype="multipart/form-data" action="index.php?action=<?=$controller?>&amp;profile=<?=$viewData['profile']?>" method="post" target="_self" accept-charset="utf-8">

               <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
                  <div class="panel-heading"><i class="fa fa-<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-menu"></i><?=$LANG['profile_edit_title'].$viewData['fullname']?></div>
                  <div class="panel-body">

                     <div class="panel panel-default">
                        <div class="panel-body">
                           <button type="submit" class="btn btn-primary" tabindex="<?=$tabindex++?>" name="btn_profileUpdate"><?=$LANG['btn_update']?></button>
                           <?php if (isAllowed("useraccount")) { ?> 
                              <a href="index.php?action=users" class="btn btn-default pull-right" tabindex="<?=$tabindex++?>"><?=$LANG['btn_user_list']?></a>
                           <?php } ?>
                        </div>
                     </div>
                     
                     <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                        <li class="active"><a href="#personal" data-toggle="tab"><?=$LANG['profile_tab_personal']?></a></li>
                        <li><a href="#contact" data-toggle="tab"><?=$LANG['profile_tab_contact']?></a></li>
                        <li><a href="#options" data-toggle="tab"><?=$LANG['options']?></a></li>
                        <li><a href="#avatar" data-toggle="tab"><?=$LANG['profile_tab_avatar']?></a></li>
                        <?php if (isAllowed("useraccount")) { ?>
                           <li><a href="#account" data-toggle="tab"><?=$LANG['profile_tab_account']?></a></li>
                        <?php } ?>
                        <li><a href="#groups" data-toggle="tab"><?=$LANG['profile_tab_groups']?></a></li>
                        <li><a href="#setpassword" data-toggle="tab"><?=$LANG['profile_tab_password']?></a></li>
                        <li><a href="#absences" data-toggle="tab"><?=$LANG['profile_tab_absences']?></a></li>
                        <li><a href="#custom" data-toggle="tab"><?=$LANG['profile_tab_custom']?></a></li>
                     </ul>
                     
                     <div id="myTabContent" class="tab-content">
                        
                        <!-- Personal tab -->
                        <div class="tab-pane fade active in" id="personal">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($viewData['personal'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
      
                        <!-- Contact tab -->
                        <div class="tab-pane fade" id="contact">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($viewData['contact'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
      
                        <!-- Options tab -->
                        <div class="tab-pane fade" id="options">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($viewData['options'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>

                        <!-- Avatar tab -->
                        <div class="tab-pane fade" id="avatar">
                           <div class="panel panel-default">
                              <div class="panel-body">
                              
                                 <div class="form-group">
                                    <label class="col-lg-<?=$colsleft?> control-label">
                                       <?=$LANG['profile_avatar']?><br>
                                       <span class="text-normal"><?=$LANG['profile_avatar_comment']?></span>
                                    </label>
                                    <div class="col-lg-<?=$colsright?>">
                                       <img src="<?=APP_AVATAR_DIR.$viewData['avatar']?>" alt="" style="width: 80px; height: 80px;"><br>
                                       <br>
                                       <?php if (substr($viewData['avatar'], 0, 9) != 'default_') { ?><button type="submit" class="btn btn-primary btn-sm" tabindex="<?=$tabindex++?>" name="btn_reset"><?=$LANG['btn_reset']?></button><?php } ?>
                                    </div>
                                 </div>
                                 <div class="divider"><hr></div>
                                 
                                 <div class="form-group">
                                    <label class="col-lg-<?=$colsleft?> control-label">
                                       <?=$LANG['profile_avatar_upload']?><br>
                                       <span class="text-normal">
                                          <?=sprintf($LANG['profile_avatar_upload_comment'],$viewData['avatar_maxsize'],$viewData['avatar_formats'])?></span>
                                    </label>
                                    <div class="col-lg-<?=$colsright?>">
                                       <input type="hidden" name="MAX_FILE_SIZE" value="<?=$viewData['avatar_maxsize']?>"><br>
                                       <input class="form-control" tabindex="<?=$tabindex++?>" name="file_avatar" type="file"><br>
                                       <button type="submit" class="btn btn-primary btn-sm" tabindex="<?=$tabindex++?>" name="btn_uploadAvatar"><?=$LANG['btn_upload']?></button>
                                    </div>
                                 </div>
                                 <div class="divider"><hr></div>
                                 
                                 <div class="form-group">
                                    <label class="col-lg-12 control-label">
                                       <?=$LANG['profile_avatar_available']?><br>
                                       <span class="text-normal">
                                          <?=$LANG['profile_avatar_available_comment']?></span>
                                    </label>
                                    <div class="col-lg-12">
                                       <?php foreach($viewData['avatars'] as $avatar) {?>
                                          <div class="pull-left" style="border: 1px solid #eeeeee; padding: 4px;"><input name="opt_avatar" value="<?=$avatar?>" tabindex="<?=$tabindex++?>" <?= ($viewData['avatar']==$avatar)?' checked="checked"':''?>type="radio"><img src="<?=APP_AVATAR_DIR.$avatar?>" alt="" style="width: 80px; height: 80px;"></div>
                                       <?php } ?>
                                    </div>
                                 </div>
                                 <div class="divider"><hr></div>
                                 
                              </div>
                           </div>
                        </div>
      
                        <?php if (isAllowed("useraccount")) { ?>
                           <!-- Account tab -->
                           <div class="tab-pane fade" id="account">
                              <div class="panel panel-default">
                                 <div class="panel-body">
                                    <?php foreach($viewData['account'] as $formObject) {
                                       echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                    } ?>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                           
                        <!-- Groups tab -->
                        <div class="tab-pane fade" id="groups">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($viewData['groups'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
      
                        <!-- Password tab -->
                        <div class="tab-pane fade" id="setpassword">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($viewData['password'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
      
                        <!-- Absences tab -->
                        <div class="tab-pane fade" id="absences">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <div class="col-lg-3"><strong><?=$LANG['profile_abs_name']?></strong></div>
                                 <div class="col-lg-2"><div class="text-bold text-center"><?=$LANG['profile_abs_allowance']?></div></div>
                                 <div class="col-lg-2"><div class="text-bold text-center"><?=$LANG['profile_abs_carryover']?>&nbsp;<?=iconTooltip($LANG['profile_abs_carryover_tt'],$LANG['profile_abs_carryover'])?></div></div>
                                 <div class="col-lg-2"><div class="text-bold text-center"><?=$LANG['profile_abs_taken']?></div></div>
                                 <div class="col-lg-1"><div class="text-bold text-center"><?=$LANG['profile_abs_factor']?></div></div>
                                 <div class="col-lg-2"><div class="text-bold text-center"><?=$LANG['profile_abs_remainder']?></div></div>
                                 <div class="divider"><hr></div>
                                 <?php foreach($viewData['abs'] as $abs) { ?>
                                    <div class="form-group">
                                       <div class="col-lg-3"><div class="text-normal"><i class="fa fa-<?=$abs['icon']?> fa-lg" style="color: #<?=$abs['color']?>; background-color: #<?=$abs['bgcolor']?>; border: 1px solid #333333; width: 30px; height: 30px; text-align: center; padding: 4px; margin-right: 8px;"></i><?=$abs['name']?></div></div>
                                       <div class="col-lg-2"><div class="text-center"><?=$abs['allowance']?></div></div>
                                       <div class="col-lg-2"><div class="text-center"><input id="txt_<?=$abs['id']?>_carryover" class="form-control text-center" tabindex="<?=$tabindex++?>" name="txt_<?=$abs['id']?>_carryover" maxlength="3" value="<?=$abs['carryover']?>"></div></div>
                                       <div class="col-lg-2"><div class="text-center"><?=$abs['taken']?></div></div>
                                       <div class="col-lg-1"><div class="text-center"><?=$abs['factor']?></div></div>
                                       <div class="col-lg-2 <?=($abs['remainder']<0?'text-danger':'text-success')?>"><div class="text-center"><?=$abs['remainder']?></div></div>
                                    </div>
                                    <div class="divider"><hr></div>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
      
                        <!-- Custom tab -->
                        <div class="tab-pane fade" id="custom">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($viewData['custom'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
      
                     </div>
                     
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <button type="submit" class="btn btn-primary" tabindex="<?=$tabindex++?>" name="btn_profileUpdate"><?=$LANG['btn_update']?></button>
                           <?php if (isAllowed("manageUsers")) { ?> 
                              <a href="index.php?action=users" class="btn btn-default pull-right" tabindex="<?=$tabindex++?>"><?=$LANG['btn_user_list']?></a>
                           <?php } ?>
                        </div>
                     </div>
                     
                  </div>
               </div>
                  
            </form>
            
         </div>
         
      </div>      
