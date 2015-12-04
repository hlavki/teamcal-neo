<?php
/**
 * permissions.php
 * 
 * The view of the permissions page
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
      view.permissions 
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
            
            <form  class="bs-example form-control-horizontal" action="index.php?action=<?=$controller?>&amp;scheme=<?=$permData['scheme']?>" method="post" target="_self" accept-charset="utf-8">
               
               <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
                  <div class="panel-heading"><i class="fa fa-<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-menu"></i><?=$LANG['perm_title'].': '.$permData['scheme'].' '.(($permData['scheme']==$permData['currentScheme'])?$LANG['perm_active']:$LANG['perm_inactive'])?></div>
                  <div class="panel-body">
                  
                     <div class="panel panel-default">
                        <div class="panel-body">
                           
                           <button type="submit" class="btn btn-primary" tabindex="<?=$tabindex++;?>" name="btn_permApply"><?=$LANG['perm_save_scheme']?></button>
                           <button class="btn btn-info" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalSelectScheme"><?=$LANG['perm_select_scheme']?></button>
                           <button class="btn btn-success" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalCreateScheme"><?=$LANG['perm_create_scheme']?></button>
                           <button class="btn btn-warning" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalResetScheme"><?=$LANG['perm_reset_scheme']?></button>
                           <?php if ( $permData['scheme'] != $permData['currentScheme'] ) { ?>
                           <button class="btn btn-warning" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalActivateScheme"><?=$LANG['perm_activate_scheme']?></button>
                              <?php if ( $permData['scheme'] != "Default" ) { ?>
                              <button class="btn btn-danger" tabindex="<?=$tabindex++;?>" data-toggle="modal" data-target="#modalDeleteScheme"><?=$LANG['perm_delete_scheme']?></button>
                              <?php }
                           } ?>
                           <?php if ( $permData['mode'] == 'byrole' ) { ?>
                              <a href="index.php?action=permissions&amp;scheme=<?=$permData['scheme']?>&amp;mode=byperm" class="btn btn-default pull-right" style="margin-right: 4px;" tabindex="<?=$tabindex++;?>"><?=$LANG['perm_view_by_perm']?></a>
                           <?php } else { ?>
                              <a href="index.php?action=permissions&amp;scheme=<?=$permData['scheme']?>&amp;mode=byrole" class="btn btn-default pull-right" style="margin-right: 4px;" tabindex="<?=$tabindex++;?>"><?=$LANG['perm_view_by_role']?></a>
                           <?php } ?>
                           
                           <!-- Modal: Select scheme -->
                           <?=createModalTop('modalSelectScheme', $LANG['perm_select_scheme'])?>
                              <select id="sel_scheme" class="form-control" name="sel_scheme">
                              <?php foreach ( $permData['schemes'] as $schm ) { ?>
                                 <option value="<?=$schm?>"<?=(($schm == $permData['scheme']) ? " selected" : "")?>><?=$schm?></option>
                              <?php } ?>
                              </select>
                              <?=$LANG['perm_select_confirm']?>
                           <?=createModalBottom('btn_permSelect', 'info', $LANG['btn_select'])?>
                           
                           <!-- Modal: Create scheme -->
                           <?=createModalTop('modalCreateScheme', $LANG['perm_create_scheme'])?>
                              <input class="form-control" name="txt_newScheme" maxlength="80" type="text" value="">
                              <?=$LANG['perm_create_scheme_desc']?>
                           <?=createModalBottom('btn_permCreate', 'success', $LANG['btn_create'])?>
                           
                           <!-- Modal: Reset scheme -->
                           <?=createModalTop('modalResetScheme', $LANG['perm_reset_scheme'])?>
                              <?=$LANG['perm_reset_confirm']?>
                           <?=createModalBottom('btn_permReset', 'warning', $LANG['btn_reset'])?>
                           
                           <!-- Modal: Activate scheme -->
                           <?=createModalTop('modalActivateScheme', $LANG['modal_confirm'])?>
                              <?=$LANG['perm_activate_confirm']?>
                           <?=createModalBottom('btn_permActivate', 'warning', $LANG['btn_activate'])?>

                           <!-- Modal: Delete scheme -->
                           <?=createModalTop('modalDeleteScheme', $LANG['modal_confirm'])?>
                              <?=$permData['scheme']?>":<br><?=$LANG['perm_delete_confirm']?>
                           <?=createModalBottom('btn_permDelete', 'danger', $LANG['btn_delete'])?>
                           
                        </div>
                     </div>
                  
                     <?php if ( $permData['mode'] == 'byrole' ) { ?>
                      
                        <!-- View: By role -->
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                           <?php foreach ($permData['roles'] as $role ) { ?> 
                           <li<?=(($role['id']==1)?" class=\"active\"":"")?>><a href="#tab<?=$role['id']?>" data-toggle="tab"><?=$role['name']?></a></li>
                           <?php } ?>
                        </ul>
                        
                        <div id="myTabContent" class="tab-content">
                           <?php foreach ($permData['roles'] as $role ) { ?> 
                           <!-- Role <?=$role['name']?> tab -->
                           <div class="tab-pane fade<?=(($role['id']==1)?" active in":"")?>" id="tab<?=$role['id']?>">
                              <div class="panel panel-default">
                                 <div class="panel-body">
                                 
                                    <?php foreach ($permData['permgroups'] as $permgroup => $permnames ) {
                                       $checked = 'checked="checked"';
                                       foreach ($permnames as $permname ) { 
                                          if (!$P->isAllowed($permData['scheme'],$permname,$role['id'])) $checked = ''; ?> 
                                       <?php } ?> 
                                       <div class="checkbox">
                                          <label><input type="checkbox" name="chk_<?=$permgroup?>_<?=$role['id']?>" value="chk_<?=$permgroup?>_<?=$role['id']?>" tabindex="<?=$tabindex++?>" <?=$checked?> <?=(($role['id']=='1')?'disabled="disabled"':'')?>><strong><?=$LANG['perm_'.$permgroup.'_title']?></strong><br><?=$LANG['perm_'.$permgroup.'_desc']?></label>
                                       </div>
                                       <hr>
                                    <?php } ?>
                                    
                                    <?php foreach ($permData['fperms'] as $fperm ) { ?> 
                                       <div class="checkbox">
                                          <label><input type="checkbox" name="chk_<?=$fperm?>_<?=$role['id']?>" value="chk_<?=$fperm?>_<?=$role['id']?>" tabindex="<?=$tabindex++?>"<?=(($P->isAllowed($permData['scheme'],$fperm,$role['id']))?" checked":"")?> <?=(($role['id']=='1')?'disabled="disabled"':'')?>><strong><?=$LANG['perm_'.$fperm.'_title']?></strong><br><?=$LANG['perm_'.$fperm.'_desc']?></label>
                                       </div>
                                       <hr>
                                    <?php } ?>
                                    
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                     
                     <?php } else { ?> 

                        <!-- View: By permission -->
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                           <li class="active"><a href="#tabGeneral" data-toggle="tab"><?=$LANG['perm_tab_general']?></a></li>
                           <li><a href="#tabFeatures" data-toggle="tab"><?=$LANG['perm_tab_features']?></a></li>
                        </ul>
                     
                        <div id="myTabContent" class="tab-content">

                           <!-- Tab: General -->
                           <div class="tab-pane fade active in" id="tabGeneral">
                              <div class="panel panel-default">
                                 <div class="panel-body">
                                    <?php foreach ($permData['permgroups'] as $key => $pages ) { ?>
                                       <div class="form-group">
                                          <label class="col-lg-<?=$colsleft?> control-label">
                                             <?=$LANG['perm_' . $key . '_title']?><br>
                                             <span class="text-normal"><?=$LANG['perm_' . $key . '_desc']?></span>
                                          </label>
                                          <div class="col-lg-<?=$colsright?>">
                                             <?php foreach ($permData['roles'] as $role ) {
                                                $checked = 'checked="checked"'; 
                                                foreach ($pages as $page) {
                                                   if (!$P->isAllowed($permData['scheme'],$page,$role['id'])) $checked = '';
                                                } ?> 
                                                <div class="checkbox">
                                                   <label><input type="checkbox" name="chk_<?=$key?>_<?=$role['id']?>" value="chk_<?=$key?>_<?=$role['id']?>" tabindex="<?=$tabindex++?>" <?=$checked?> <?=(($role['id']=='1')?'disabled="disabled"':'')?>><?=$role['name']?></label>
                                                </div>
                                             <?php } ?>
                                          </div>
                                       </div>
                                       <div class="divider"><hr></div>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                        
                           <!-- Tab: Features -->
                           <div class="tab-pane fade" id="tabFeatures">
                              <div class="panel panel-default">
                                 <div class="panel-body">
                                    <?php foreach ($permData['fperms'] as $fperm ) { ?>
                                       <div class="form-group">
                                          <label class="col-lg-<?=$colsleft?> control-label">
                                             <?=$LANG['perm_'.$fperm.'_title']?><br>
                                             <span class="text-normal"><?=$LANG['perm_'.$fperm.'_desc']?></span>
                                          </label>
                                          <div class="col-lg-<?=$colsright?>">
                                             <?php foreach ($permData['roles'] as $role ) { ?> 
                                                <div class="checkbox">
                                                   <label><input type="checkbox" name="chk_<?=$fperm?>_<?=$role['id']?>" value="chk_<?=$fperm?>_<?=$role['id']?>" tabindex="<?=$tabindex++?>"<?=(($P->isAllowed($permData['scheme'],$fperm,$role['id']))?" checked":"")?> <?=(($role['id']=='1')?'disabled="disabled"':'')?>><?=$role['name']?></label>
                                                </div>
                                             <?php } ?>
                                          </div>
                                       </div>
                                       <div class="divider"><hr></div>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                           
                     <?php } ?>
                     
                  </div>
               </div>
               
            </form>
         </div>
      </div>      
            