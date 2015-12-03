<?php
/**
 * alert.php
 * 
 * The view of the alert page
 *
 * @category TeamCal Neo 
 * @version 0.3.002
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2015 by George Lewe
 * @link http://www.lewe.com
 * @license
 */
if (!defined('VALID_ROOT')) die('No direct access allowed!');
?>

      <!-- ==================================================================== 
      view.alert 
      -->
      <div class="container content">
      
         <div class="col-lg-12">
            <div class="alert alert-<?=$alertData['type']?>">
               <h4><strong><?=$alertData['title']?>!</strong></h4>
               <hr>
               <p><strong><?=$alertData['subject']?></strong></p>
               <p><?=$alertData['text']?></p>
               <p><?=$alertData['help']?></p>
            </div>         
         </div>
         
      </div>
