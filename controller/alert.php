<?php
/**
 * alert.php
 * 
 * Alert page controller
 *
 * @category TeamCal Neo 
 * @version 0.5.003
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2016 by George Lewe
 * @link http://www.lewe.com
 * @license (Not available yet)
 */
if (!defined('VALID_ROOT')) exit('No direct access allowed!');

//=============================================================================
//
// SHOW VIEW
//
require (WEBSITE_ROOT . '/views/header.php');
require (WEBSITE_ROOT . '/views/menu.php');
include (WEBSITE_ROOT . '/views/alert.php');
require (WEBSITE_ROOT . '/views/footer.php');
?>
