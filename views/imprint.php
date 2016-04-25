<?php
/**
 * imprint.php
 * 
 * Imprint page view
 *
 * @category TeamCal Neo 
 * @version 0.5.004
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2016 by George Lewe
 * @link http://www.lewe.com
 * @license (Not available yet)
 */
if (!defined('VALID_ROOT')) die('No direct access allowed!');
?>

      <!-- ==================================================================== 
      view.imprint
      -->
      <div class="container content">
      
         <div class="col-lg-12">
            <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
               <div class="panel-heading"><i class="fa fa-<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-menu"></i><?=$LANG['mnu_help_imprint']?></div>
               <div class="panel-body">
                  <div class="col-lg-12">
                     <?php foreach ($LANG['imprint'] as $imprint) { ?>
                        <h4 style="margin-top: 40px"><?=$imprint['title']?></h4>
                        <?=$imprint['text']?>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>

      </div>
