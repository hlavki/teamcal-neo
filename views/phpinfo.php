<?php
if (!defined('VALID_ROOT')) exit('');
/**
 * PHP Info View
 *
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2020 by George Lewe
 * @link https://www.lewe.com
 *
 * @package TeamCal Neo
 * @subpackage Views
 * @since 3.0.0
 */
?>

      <!-- ==================================================================== 
      view.phpinfo
      -->
      <div class="container content">
      
         <div class="col-lg-12">
            <div class="card">
               <?php 
               $pageHelp = '';
               if ($C->read('pageHelp')) $pageHelp = '<a href="'.$CONF['controllers'][$controller]->docurl.'" target="_blank" class="float-right" style="color:inherit;"><i class="fas fa-question-circle fa-lg"></i></a>';
               ?>
               <div class="card-header text-white bg-<?=$CONF['controllers'][$controller]->panelColor?>"><i class="<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-header"></i><?=$LANG['phpinfo_title'].$pageHelp?></div>
               <div class="card-body">
                  <?=$viewData['phpInfo']?>
               </div>
            </div>
         </div>
         
      </div>
