<?php
if (!defined('VALID_ROOT')) exit('');
/**
 * View Helper Functions
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
 * Creates a form-group object based on input parameters
 *
 * @param array $data Array with the alert data
 */
function createAlertBox($data)
{
    global $LANG;
    $alertBox = '
    <div class="alert alert-dismissable alert-' . $data['type'] . ' fade show" role="alert">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" title="' . $LANG['close_this_message'] . '"></button>
        <h5>' . $data['title'] . '</h5>
        <hr>
        <p><strong>' . $data['subject'] . '</strong></p>
        <p>' . $data['text'] . '</p>
        ' . (strlen($data['help']) ? "<p><i>" . $data['help'] . "</i></p>" : "") . '
    </div>';
    return $alertBox;
}

// ---------------------------------------------------------------------------
/**
 * Creates a form-group object based on input parameters
 *
 * @param array $data Array with the alert data
 */
function createFaIconListbox($tabIndex = "-1", $selected = "")
{
    global $faIcons;
    $listbox = '<select id="faIcon" class="form-control" name="sel_faIcon" tabindex="' . $tabIndex . '">';

    foreach ($faIcons as $faIcon) {
        if ($faIcon == $selected) $sel = ' selected="selected"';
        else $sel = "";
        $listbox .= '<option value="' . $faIcon . '"' . $sel . '>' . proper($faIcon) . '</option>';
    }
    $listbox .= '</select>';
    return $listbox;
}

// ---------------------------------------------------------------------------
/**
 * Creates a form-group object based on input parameters
 *
 * @param array $data Array of parameters defining the form-group type and content
 */
function createFormGroup($data, $colsleft, $colsright, $tabindex)
{
    global $LANG;

    $langIdx1 = $data['prefix'] . '_' . $data['name'];
    $langIdx2 = $data['prefix'] . '_' . $data['name'] . '_comment';

    $button = '';
    if (isset($data['action']) and !empty($data['action'])) {
        $name = 'btn_' . $data['action']['name'];
        $target = $data['action']['target'];
        $button = '<button type="button" class="btn btn-primary btn-sm" style="margin-top: 8px;" tabindex="' . ($tabindex + 1) . '" name="' . $name . '" onclick="window.location=\'' . $target . '\';">' . $LANG[$name] . '</button>';
    }

    $disabled = '';
    if (isset($data['disabled']) and $data['disabled']) $disabled = ' disabled="disabled"';

    $mandatory = '';
    if (isset($data['mandatory']) and $data['mandatory']) $mandatory = '<i class="text-danger">*</i> ';

    $error = '';
    if (isset($data["error"]) and strlen($data["error"])) {
        $error = '<br><div class="alert alert-dismissible alert-danger fade show"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . $data['error'] . '</div>';
    }

    switch ($data['type']) {
        /**
         * Checkbox
         */
        case 'check':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="' . $data['name'] . '" name="chk_' . $data['name'] . '" value="chk_' . $data['name'] . '"' . ((intval($data['value'])) ? " checked" : "") . ' tabindex="' . $tabindex . '"' . $disabled . '>
                    <label class="form-check-label">' . $LANG[$langIdx1] . '</label>
                </div>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Color selection text field
         */
        case 'color':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <input id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" type="text" maxlength="6" value="' . $data['value'] . '"' . $disabled . '>
                ' . $button . $error . '</div>
                <script>$(function() { $( "#' . $data['name'] . '" ).ColorPicker({ onSubmit: function(hsb, hex, rgb, el) { $(el).val(hex.toUpperCase()); $(el).ColorPickerHide(); }, onBeforeShow: function () { $(this).ColorPickerSetColor(this.value); } }) .bind(\'keyup\', function(){ $(this).ColorPickerSetColor(this.value); }); });</script>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Date selection text field
         */
        case 'date':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <input id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" type="text" maxlength="10" value="' . $data['value'] . '"' . $disabled . '>
                ' . $button . $error . '</div>
                <script>$(function() { $( "#' . $data['name'] . '" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" }); });</script>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Single select list
         */
        case 'list':
            $style = '';
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <select id="' . $data['name'] . '" class="form-select" name="sel_' . $data['name'] . '" tabindex="' . $tabindex . '"' . $disabled . '>' . "\r\n";
            foreach ($data['values'] as $val) {
                if (isset($data['imagelist']) and $data['imagelist'] and isset($data['imagedir'])) {
                    $style = $style = 'style="background-image: url(\'' . $data['imagedir'] . '/' . $val['val'] . '\'); background-size: 16px 16px; background-repeat: no-repeat; padding-left: 20px;"';
                }
                $formGroup .= '<option ' . $style . ' value="' . $val['val'] . '"' . (($val['selected']) ? " selected=\"selected\"" : "") . '>' . $val['name'] . '</option>' . "\r\n";
            }
            $formGroup .= '</select>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Multi select list
         */
        case 'listmulti':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <select id="' . $data['name'] . '" class="form-select" name="sel_' . $data['name'] . '[]" tabindex="' . $tabindex . '" multiple="multiple" size="10"' . $disabled . '>' . "\r\n";
            foreach ($data['values'] as $val) {
                $formGroup .= '<option value="' . $val['val'] . '"' . (($val['selected']) ? " selected=\"selected\"" : "") . '>' . $val['name'] . '</option>' . "\r\n";
            }
            $formGroup .= '</select>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Password text field
         */
        case 'password':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <input id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" type="password" maxlength="' . $data['maxlength'] . '" value="' . $data['value'] . '" placeholder="' . $LANG['enter_password'] . '" autocomplete="new-password"' . $disabled . '>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Radio box
         */
        case 'radio':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">';
            foreach ($data['values'] as $val) {
                $langIdx3 = $data['prefix'] . '_' . $data['name'] . '_' . $val;
                $formGroup .= '<div class="radio">';
                $formGroup .= '<label><input name="opt_' . $data['name'] . '" value="' . $val . '" tabindex="' . $tabindex . '" type="radio"' . (($val == $data['value']) ? " checked" : "") . $disabled . '>' . $LANG[$langIdx3] . '</label>';
                $formGroup .= '</div>';
            }
            $formGroup .= $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Securimage
         */
        case 'securimage':
            $langIdx3 = $data['prefix'] . '_' . $data['name'] . '_new';
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <img id="captcha" src="addons/securimage/securimage_show.php" alt="CAPTCHA Image"><br>
                [<a href="#" onclick="document.getElementById(\'captcha\').src = \'addons/securimage/securimage_show.php?\' + Math.random(); return false">' . $LANG[$langIdx3] . '</a>]
                <input id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" placeholder="Code"  value="' . $data['value'] . '" type="text" maxlength="' . $data['maxlength'] . '"' . $disabled . '>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Text field
         */
        case 'text':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <input id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" type="text" maxlength="' . $data['maxlength'] . '" value="' . $data['value'] . '" placeholder="' . $data['placeholder'] . '"' . $disabled . '>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Text Long
         * Textbox will appear underneath the label in full width.
         */
        case 'textlong':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-12 control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-12">
                <input id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" type="text" maxlength="' . $data['maxlength'] . '" value="' . $data['value'] . '" placeholder="' . $data['placeholder'] . '"' . $disabled . '>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Textarea
         */
        case 'textarea':
            $formGroup = '
            <div class="form-group row" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-' . $colsleft . ' control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-' . $colsright . '">
                <textarea id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" rows="' . $data['rows'] . '" placeholder="' . $data['placeholder'] . '" ' . $disabled . '>' . $data['value'] . '</textarea>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;

        /**
         * Textarea CKEditor
         */
        case 'ckeditor':
            $formGroup = '
            <div class="form-group" id="form-group-' . $data['name'] . '">
                <label for="' . $data['name'] . '" class="col-lg-12 control-label">
                ' . $mandatory . $LANG[$langIdx1] . '<br>
                <span class="text-normal">' . $LANG[$langIdx2] . '</span>
                </label>
                <div class="col-lg-12">
                <textarea id="' . $data['name'] . '" class="form-control" tabindex="' . $tabindex . '" name="txt_' . $data['name'] . '" rows="' . $data['rows'] . '"' . $disabled . '>' . $data['value'] . '</textarea>
                <script>CKEDITOR.replace( "' . $data['name'] . '" );</script>
                ' . $button . $error . '</div>
            </div>
            <div class="divider"><hr></div>';
            break;
    }

    return $formGroup;
}

// ---------------------------------------------------------------------------
/**
 * Creates the top part of a modal dialog
 *
 * @param string $id ID of the modal dialog
 * @param string $title Title of the modal dialog
 */
function createModalTop($id, $title)
{
    $modaltop = '
    <div class="modal fade" id="' . $id . '" tabindex="-1" role="dialog" aria-labelledby="' . $id . 'Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">' . $title . '</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">';

    return $modaltop;
}

// ---------------------------------------------------------------------------
/**
 * Creates the bottom part of a modal dialog
 *
 * @param array $data Array of parameters defining the form-group type and content
 */
function createModalBottom($buttonID = '', $buttonColor, $buttonText)
{
    global $LANG;

    $modalbottom = '
            </div>
            <div class="modal-footer">';

    if (strlen($buttonID)) $modalbottom .= '          <button type="submit" class="btn btn-' . $buttonColor . '" name="' . $buttonID . '" style="margin-top: 4px;">' . $buttonText . '</button>';

    $modalbottom .= '          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">' . $LANG['btn_cancel'] . '</button>
            </div>
        </div>
        </div>
    </div>';

    return $modalbottom;
}

// ---------------------------------------------------------------------------
/**
 * Returns a tooltip span element with a Font Aweseom icon
 *
 * @param string $type BS color code (info,success,warning,danger) (Default: info)
 * @param string $icon Font Awesome icon to use (Default: question-circle)
 * @param string $position Tooltip position (top,right,bottom,left) (Default: top)
 * @param string $text Tooltip text (HTML allowed)
 *
 * @return string
 */
function iconTooltip($text = 'Tooltip text', $title = '', $position = 'top', $type = 'info', $icon = 'question-circle')
{
    if (strlen($title)) $ttText = "<div class='text-bold' style='padding-top: 4px; padding-bottom: 4px'>" . $title . "</div>";
    $ttText .= "<div class='text-normal'>" . $text . "</div>";
    $html = '<span data-placement="' . $position . '" data-type="' . $type . ' fas fa-' . $icon . ' text-' . $type . '" data-bs-toggle="tooltip" title="' . $ttText . '"></span>';
    return $html;
}
