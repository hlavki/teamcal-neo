<?php
/**
 * phpinfo.php
 * 
 * Phpinfo page view
 *
 * @category TeamCal Neo 
 * @version 1.3.005
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2017 by George Lewe
 * @link http://www.lewe.com
 * @license https://georgelewe.atlassian.net/wiki/x/AoC3Ag
 */
if (!defined('VALID_ROOT')) die('No direct access allowed!');
?>

      <!-- ==================================================================== 
      view.phpinfo
      -->
      <div class="container content">
      
         <div class="col-lg-12">
            <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
               <div class="panel-heading"><i class="fa fa-<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-menu"></i><?=$LANG['phpinfo_title']?></div>
               <div class="panel-body">
                  <?=$viewData['phpInfo']?>
               </div>
            </div>
         </div>
         
      </div>
