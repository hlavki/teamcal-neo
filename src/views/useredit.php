<?php
if (!defined('VALID_ROOT')) exit('');
/**
 * User Edit View
 *
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2023 by George Lewe
 * @link https://www.lewe.com
 *
 * @package TeamCal Neo
 * @subpackage Views
 * @since 3.0.0
 */
?>

<!-- ====================================================================
view.useredit
-->
<div class="container content">

  <div class="col-lg-12">
    <?php
    if ($showAlert and $C->read("showAlerts") != "none") {
      if (
        $C->read("showAlerts") == "all" or
        $C->read("showAlerts") == "warnings" and ($alertData[ 'type' ] == "warning" or $alertData[ 'type' ] == "danger")
      ) {
        echo createAlertBox($alertData);
      }
    }
    $tabindex = 1;
    $colsleft = 8;
    $colsright = 4;
    ?>

    <form class="form-control-horizontal" enctype="multipart/form-data" action="index.php?action=<?= $controller ?>&amp;profile=<?= $viewData[ 'profile' ] ?>" method="post" target="_self" accept-charset="utf-8">

      <div class="card">
        <?php
        $pageHelp = '';
        if ($C->read('pageHelp')) $pageHelp = '<a href="' . $CONF[ 'controllers' ][ $controller ]->docurl . '" target="_blank" class="float-end" style="color:inherit;"><i class="fas fa-question-circle fa-lg"></i></a>';
        ?>
        <div class="card-header text-white bg-<?= $CONF[ 'controllers' ][ $controller ]->panelColor ?>"><i class="<?= $CONF[ 'controllers' ][ $controller ]->faIcon ?> fa-lg me-3"></i><?= $LANG[ 'profile_edit_title' ] . $viewData[ 'fullname' ] . $pageHelp ?></div>
        <div class="card-body">

          <div class="card">
            <div class="card-body">
              <button type="submit" class="btn btn-primary" tabindex="<?= $tabindex++ ?>" name="btn_profileUpdate"><?= $LANG[ 'btn_update' ] ?></button>
              <?php if (isAllowed("useraccount") and $viewData[ 'profile' ] != "admin") { ?>
                <button type="button" class="btn btn-warning" tabindex="<?= $tabindex++; ?>" data-bs-toggle="modal" data-bs-target="#modalArchiveProfile"><?= $LANG[ 'btn_archive' ] ?></button>
                <button type="button" class="btn btn-danger" tabindex="<?= $tabindex++; ?>" data-bs-toggle="modal" data-bs-target="#modalDeleteProfile"><?= $LANG[ 'btn_delete' ] ?></button>
              <?php } ?>
              <?php if (isAllowed("useraccount")) { ?>
                <a href="index.php?action=users" class="btn btn-secondary float-end" tabindex="<?= $tabindex++ ?>"><?= $LANG[ 'btn_user_list' ] ?></a>
              <?php } ?>
            </div>
          </div>
          <div style="height:20px;"></div>

          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="personal-tab" href="#personal" data-bs-toggle="tab" role="tab" aria-controls="personal" aria-selected="true"><?= $LANG[ 'profile_tab_personal' ] ?></a></li>
            <li class="nav-item"><a class="nav-link" id="contact-tab" href="#contact" data-bs-toggle="tab" role="tab" aria-controls="contact" aria-selected="false"><?= $LANG[ 'profile_tab_contact' ] ?></a></li>
            <li class="nav-item"><a class="nav-link" id="setpassword-tab" href="#setpassword" data-bs-toggle="tab" role="tab" aria-controls="setpassword" aria-selected="false"><?= $LANG[ 'profile_tab_password' ] ?></a></li>

            <?php if (isAllowed("userabsences") and $viewData[ 'profile' ] != "admin") { ?>
              <li class="nav-item"><a class="nav-link" id="absences-tab" href="#absences" data-bs-toggle="tab" role="tab" aria-controls="absences" aria-selected="false"><?= $LANG[ 'profile_tab_absences' ] ?></a></li>
            <?php } ?>

            <?php if (isAllowed("useraccount") and $viewData[ 'profile' ] != "admin") { ?>
              <li class="nav-item"><a class="nav-link" id="account-tab" href="#account" data-bs-toggle="tab" role="tab" aria-controls="account" aria-selected="false"><?= $LANG[ 'profile_tab_account' ] ?></a></li>
            <?php } ?>

            <?php if (isAllowed("useravatar")) { ?>
              <li class="nav-item"><a class="nav-link" id="avatar-tab" href="#avatar" data-bs-toggle="tab" role="tab" aria-controls="avatar" aria-selected="false"><?= $LANG[ 'profile_tab_avatar' ] ?></a></li>
            <?php } ?>

            <?php if (isAllowed("usercustom")) { ?>
              <li class="nav-item"><a class="nav-link" id="custom-tab" href="#custom" data-bs-toggle="tab" role="tab" aria-controls="custom" aria-selected="false"><?= $LANG[ 'profile_tab_custom' ] ?></a></li>
            <?php } ?>

            <?php if (isAllowed("usergroups")) { ?>
              <li class="nav-item"><a class="nav-link" id="groups-tab" href="#groups" data-bs-toggle="tab" role="tab" aria-controls="groups" aria-selected="false"><?= $LANG[ 'profile_tab_groups' ] ?></a></li>
            <?php } ?>

            <?php if (isAllowed("usernotifications")) { ?>
              <li class="nav-item"><a class="nav-link" id="notifications-tab" href="#notifications" data-bs-toggle="tab" role="tab" aria-controls="notifications" aria-selected="false"><?= $LANG[ 'profile_tab_notifications' ] ?></a></li>
            <?php } ?>

            <?php if (isAllowed("useroptions")) { ?>
              <li class="nav-item"><a class="nav-link" id="options-tab" href="#options" data-bs-toggle="tab" role="tab" aria-controls="options" aria-selected="false"><?= $LANG[ 'options' ] ?></a></li>
            <?php } ?>
            <li class="nav-item"><a class="nav-link" id="tfa-tab" href="#tfa" data-bs-toggle="tab" role="tab" aria-controls="tfa" aria-selected="false"><?= $LANG[ 'profile_tab_tfa' ] ?></a></li>
          </ul>

          <div id="myTabContent" class="tab-content">

            <!-- Personal tab -->
            <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
              <div class="card">
                <div class="card-body">
                  <?php foreach ($viewData[ 'personal' ] as $formObject) {
                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                  } ?>
                </div>
              </div>
            </div>

            <!-- Contact tab -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="card">
                <div class="card-body">
                  <?php foreach ($viewData[ 'contact' ] as $formObject) {
                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                  } ?>
                </div>
              </div>
            </div>

            <?php if (isAllowed("useroptions")) { ?>
              <!-- Options tab -->
              <div class="tab-pane fade" id="options" role="tabpanel" aria-labelledby="options-tab">
                <div class="card">
                  <div class="card-body">
                    <?php foreach ($viewData[ 'options' ] as $formObject) {
                      echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                    } ?>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if (isAllowed("useravatar")) { ?>
              <!-- Avatar tab -->
              <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                <div class="card">
                  <div class="card-body">

                    <div class="form-group row">
                      <label class="col-lg-<?= $colsleft ?> control-label">
                        <?= $LANG[ 'profile_avatar' ] ?><br>
                        <span class="text-normal"><?= $LANG[ 'profile_avatar_comment' ] ?></span>
                      </label>
                      <div class="col-lg-<?= $colsright ?>">
                        <img src="<?= APP_AVATAR_DIR . $viewData[ 'avatar' ] ?>" alt="" style="width: 80px; height: 80px;"><br>
                        <br>
                        <?php if (substr($viewData[ 'avatar' ], 0, 9) != 'default_') { ?>
                          <button type="submit" class="btn btn-primary btn-sm" tabindex="<?= $tabindex++ ?>" name="btn_reset"><?= $LANG[ 'btn_reset' ] ?></button><?php } ?>
                      </div>
                    </div>
                    <div class="divider">
                      <hr>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-<?= $colsleft ?> control-label">
                        <?= $LANG[ 'profile_avatar_upload' ] ?><br>
                        <span class="text-normal">
                          <?= sprintf($LANG[ 'profile_avatar_upload_comment' ], $viewData[ 'avatar_maxsize' ], $viewData[ 'avatar_formats' ]) ?></span>
                      </label>
                      <div class="col-lg-<?= $colsright ?>">
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $viewData[ 'avatar_maxsize' ] ?>"><br>
                        <input class="form-control" tabindex="<?= $tabindex++ ?>" name="file_avatar" type="file"><br>
                        <button type="submit" class="btn btn-primary btn-sm" tabindex="<?= $tabindex++ ?>" name="btn_uploadAvatar"><?= $LANG[ 'btn_upload' ] ?></button>
                      </div>
                    </div>
                    <div class="divider">
                      <hr>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-12 control-label">
                        <?= $LANG[ 'profile_avatar_available' ] ?><br>
                        <span class="text-normal">
                          <?= $LANG[ 'profile_avatar_available_comment' ] ?></span>
                      </label>
                      <div class="col-lg-12">
                        <?php foreach ($viewData[ 'avatars' ] as $avatar) { ?>
                          <div class="float-start" style="border: 1px solid #eeeeee; padding: 4px;">
                            <input name="opt_avatar" value="<?= $avatar ?>" tabindex="<?= $tabindex++ ?>" <?= ($viewData[ 'avatar' ] == $avatar) ? ' checked="checked" ' : '' ?>type="radio">
                            <img src="<?= APP_AVATAR_DIR . $avatar ?>" alt="" style="width: 80px; height: 80px;">
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="divider">
                      <hr>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if (isAllowed("useraccount") and $viewData[ 'profile' ] != "admin") { ?>
              <!-- Account tab -->
              <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                <div class="card">
                  <div class="card-body">
                    <?php foreach ($viewData[ 'account' ] as $formObject) {
                      echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                    } ?>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if (isAllowed("usergroups")) { ?>
              <!-- Groups tab -->
              <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
                <div class="card">
                  <div class="card-body">
                    <?php foreach ($viewData[ 'groups' ] as $formObject) {
                      echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                    } ?>
                  </div>
                </div>
              </div>
            <?php } ?>

            <!-- Password tab -->
            <div class="tab-pane fade" id="setpassword" role="tabpanel" aria-labelledby="setpassword-tab">
              <div class="card">
                <div class="card-body">
                  <?php foreach ($viewData[ 'password' ] as $formObject) {
                    echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                  } ?>
                </div>
              </div>
            </div>

            <?php if (isAllowed("userabsences") and $viewData[ 'profile' ] != "admin") { ?>
              <!-- Absences tab -->
              <div class="tab-pane fade" id="absences" role="tabpanel" aria-labelledby="absences-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-lg-3"><strong><?= $LANG[ 'profile_abs_name' ] ?></strong></div>
                      <div class="col-lg-2">
                        <div class="text-bold text-center"><?= $LANG[ 'profile_abs_allowance' ] ?>&nbsp;
                          <?php if (isAllowed("userallowance")) { ?>
                            <?= iconTooltip($LANG[ 'profile_abs_allowance_tt' ], $LANG[ 'profile_abs_allowance' ]) ?>
                          <?php } else { ?>
                            <?= iconTooltip($LANG[ 'profile_abs_allowance_tt2' ], $LANG[ 'profile_abs_allowance' ]) ?>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-bold text-center"><?= $LANG[ 'profile_abs_carryover' ] ?>&nbsp;<?= iconTooltip($LANG[ 'profile_abs_carryover_tt' ], $LANG[ 'profile_abs_carryover' ]) ?></div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-bold text-center"><?= $LANG[ 'profile_abs_taken' ] ?></div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-bold text-center"><?= $LANG[ 'profile_abs_factor' ] ?></div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-bold text-center"><?= $LANG[ 'profile_abs_remainder' ] ?></div>
                      </div>
                    </div>
                    <div class="divider">
                      <hr>
                    </div>
                    <?php foreach ($viewData[ 'abs' ] as $abs) { ?>
                      <div class="form-group row">
                        <div class="col-lg-3">
                          <div class="text-normal"><i class="<?= $abs[ 'icon' ] ?> fa-lg" style="color: #<?= $abs[ 'color' ] ?>; background-color: #<?= $abs[ 'bgcolor' ] ?>; border: 1px solid #333333; width: 30px; height: 30px; text-align: center; padding: 4px; margin-right: 8px;"></i><?= $abs[ 'name' ] ?></div>
                        </div>
                        <?php if (isAllowed("userallowance")) { ?>
                          <div class="col-lg-2">
                            <div class="text-center"><input style="width:66%;float:left;" id="txt_<?= $abs[ 'id' ] ?>_allowance" class="form-control text-center" tabindex="<?= $tabindex++ ?>" name="txt_<?= $abs[ 'id' ] ?>_allowance" maxlength="3" value="<?= $abs[ 'allowance' ] ?>"> <span class="small">(<?= $abs[ 'gallowance' ] ?>)</span></div>
                          </div>
                        <?php } else { ?>
                          <div class="col-lg-2">
                            <div class="text-center"><?= $abs[ 'allowance' ] ?> (<?= $abs[ 'gallowance' ] ?>)</div>
                          </div>
                        <?php } ?>
                        <div class="col-lg-2">
                          <div class="text-center"><input id="txt_<?= $abs[ 'id' ] ?>_carryover" class="form-control text-center" tabindex="<?= $tabindex++ ?>" name="txt_<?= $abs[ 'id' ] ?>_carryover" maxlength="3" value="<?= $abs[ 'carryover' ] ?>"></div>
                        </div>
                        <div class="col-lg-2">
                          <div class="text-center"><?= $abs[ 'taken' ] ?></div>
                        </div>
                        <div class="col-lg-1">
                          <div class="text-center"><?= $abs[ 'factor' ] ?></div>
                        </div>
                        <div class="col-lg-2 <?= ($abs[ 'remainder' ] < 0 ? 'text-danger' : 'text-success') ?>">
                          <div class="text-center"><?= $abs[ 'remainder' ] ?></div>
                        </div>
                      </div>
                      <div class="divider">
                        <hr>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if (isAllowed("usernotifications")) { ?>
              <!-- Notifications tab -->
              <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                <div class="card">
                  <div class="card-body">
                    <?php foreach ($viewData[ 'notifications' ] as $formObject) {
                      echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                    } ?>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if (isAllowed("usercustom")) { ?>
              <!-- Custom tab -->
              <div class="tab-pane fade" id="custom" role="tabpanel" aria-labelledby="custom-tab">
                <div class="card">
                  <div class="card-body">
                    <?php foreach ($viewData[ 'custom' ] as $formObject) {
                      echo createFormGroup($formObject, $colsleft, $colsright, $tabindex++);
                    } ?>
                  </div>
                </div>
              </div>
            <?php } ?>

            <!-- 2FA tab -->
            <div class="tab-pane fade" id="tfa" role="tabpanel" aria-labelledby="tfa-tab">
              <div class="card">
                <div class="card-body">
                  <?php if ($UO->read($UP->username, 'secret')) { ?>
                    <div class="form-group row" id="form-group-activateMessages">
                      <label for="activateMessages" class="col-lg-8 control-label"><?= $LANG[ 'profile_remove2fa' ] ?><br>
                        <span class="text-normal"><?= $LANG[ 'profile_remove2fa_comment' ] ?></span>
                      </label>
                      <div class="col-lg-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="remove2fa" name="chk_remove2fa" value="chk_remove2fa" tabindex="<?= $tabindex++ ?>">
                          <label class="form-check-label"><?= $LANG[ 'profile_remove2fa' ] ?></label>
                        </div>
                      </div>
                    </div>
                  <?php } else { ?>
                    <div class="alert alert-info">
                      <?= $LANG[ 'profile_2fa_optional' ] ?>
                      <div><a href="index.php?action=setup2fa&profile=<?= $UP->username ?>" class="btn btn-secondary mt-2" tabindex="<?= $tabindex++ ?>"><?= $LANG[ 'btn_setup2fa' ] ?></a></div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>

          </div>

          <div style="height:20px;"></div>
          <div class="card">
            <div class="card-body">
              <button type="submit" class="btn btn-primary" tabindex="<?= $tabindex++ ?>" name="btn_profileUpdate"><?= $LANG[ 'btn_update' ] ?></button>
              <?php if (isAllowed("manageUsers")) { ?>
                <a href="index.php?action=users" class="btn btn-secondary float-end" tabindex="<?= $tabindex++ ?>"><?= $LANG[ 'btn_user_list' ] ?></a>
              <?php } ?>
            </div>
          </div>

          <!-- Modal: Archive profile -->
          <?= createModalTop('modalArchiveProfile', $LANG[ 'modal_confirm' ]) ?>
          <?= $LANG[ 'profile_confirm_archive' ] ?>
          <?= createModalBottom('btn_profileArchive', 'warning', $LANG[ 'btn_archive' ]) ?>

          <!-- Modal: Delete profile -->
          <?= createModalTop('modalDeleteProfile', $LANG[ 'modal_confirm' ]) ?>
          <?= $LANG[ 'profile_confirm_delete' ] ?>
          <?= createModalBottom('btn_profileDelete', 'danger', $LANG[ 'btn_delete' ]) ?>

        </div>
      </div>

    </form>

  </div>

</div>
