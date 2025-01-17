<?php
if (!defined('VALID_ROOT')) exit('');
/**
 * Data Privacy View
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
view.dataprivacy
-->
<div class="container content">

    <div class="col-lg-12">
        <div class="card">
            <?php
            $pageHelp = '';
            if ($C->read('pageHelp')) $pageHelp = '<a href="' . $CONF['controllers'][$controller]->docurl . '" target="_blank" class="float-end" style="color:inherit;"><i class="fas fa-question-circle fa-lg"></i></a>';
            ?>
            <div class="card-header bg-<?= $CONF['controllers'][$controller]->panelColor ?>"><i class="<?= $CONF['controllers'][$controller]->faIcon ?> fa-lg me-3"></i><?= $LANG['gdpr_title'] . $pageHelp ?></div>
            <div class="card-body">
                <div class="col-lg-12 gdpr"><?= $viewData['gdpr_text'] ?></div>
            </div>
        </div>
    </div>

</div>