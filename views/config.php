<?php
/**
 * config.php
 * 
 * The view of the config page
 *
 * @category TeamCal Neo 
 * @version 0.3.003
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2015 by George Lewe
 * @link http://www.lewe.com
 * @license
 */
if (!defined('VALID_ROOT')) die('No direct access allowed!');
?>

      <!-- ==================================================================== 
      view.config 
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
         } ?>
         <?php $tabindex = 1; $colsleft = 8; $colsright = 4;?>
            
            <form  class="bs-example form-control-horizontal" action="index.php?action=<?=$controller?>" method="post" target="_self" accept-charset="utf-8">

               <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
                  <div class="panel-heading"><i class="fa fa-<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-menu"></i><?=$LANG['config_title']?></div>
                  <div class="panel-body">
                  
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <button type="submit" class="btn btn-primary" tabindex="<?=$tabindex++;?>" name="btn_confApply"><?=$LANG['btn_apply']?></button>
                        </div>
                     </div>
                     
                     <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                        <li class="active"><a href="#general" data-toggle="tab"><?=$LANG['general']?></a></li>
                        <li><a href="#email" data-toggle="tab"><?=$LANG['config_email']?></a></li>
                        <li><a href="#login" data-toggle="tab"><?=$LANG['config_login']?></a></li>
                        <li><a href="#registration" data-toggle="tab"><?=$LANG['config_registration']?></a></li>
                        <li><a href="#system" data-toggle="tab"><?=$LANG['config_system']?></a></li>
                        <li><a href="#theme" data-toggle="tab"><?=$LANG['config_tab_theme']?></a></li>
                        <li><a href="#usericons" data-toggle="tab"><?=$LANG['config_user']?></a></li>
                     </ul>

                     <div id="myTabContent" class="tab-content">
                        
                        <!-- General tab -->
                        <div class="tab-pane fade active in" id="general">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['general'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
      
                        <!-- E-mail tab -->
                        <div class="tab-pane fade" id="email">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['email'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
                        
                        <!-- Login tab -->
                        <div class="tab-pane fade" id="login">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['login'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
                        
                        <!-- Registration tab -->
                        <div class="tab-pane fade" id="registration">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['registration'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
                        
                        <!-- System tab -->
                        <div class="tab-pane fade" id="system">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['system'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
                        
                        <!-- Theme tab -->
                        <div class="tab-pane fade" id="theme">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['theme'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
                        
                        <!-- User tab -->
                        <div class="tab-pane fade" id="usericons">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <?php foreach($configData['user'] as $formObject) {
                                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                                 } ?>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <button type="submit" class="btn btn-primary" tabindex="<?=$tabindex++;?>" name="btn_confApply"><?=$LANG['btn_apply']?></button>
                        </div>
                     </div>
                     
                  </div>
               </div>
               
            </form>
            
         </div>
         
      </div>      
            