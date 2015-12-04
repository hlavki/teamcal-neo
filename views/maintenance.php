<?php
/**
 * maintenance.php
 * 
 * The view of the about page
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
      view.maintenance
      -->
      <div class="container content">
      
         <div class="col-lg-12">
            <div class="panel panel-<?=$CONF['controllers'][$controller]->panelColor?>">
               <div class="panel-heading"><i class="fa fa-<?=$CONF['controllers'][$controller]->faIcon?> fa-lg fa-menu"></i><?=$LANG['mtce_title']?></div>
               <div class="panel-body">
                  <div class="col-lg-3"><img src="images/maintenance.gif" alt="" class="img_floatleft">
                  </div>
                  <div class="col-lg-9">
                     <h2><?=$LANG['mtce_title']?></h2>
                     <h3><?=$LANG['mtce_text']?></h3>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
