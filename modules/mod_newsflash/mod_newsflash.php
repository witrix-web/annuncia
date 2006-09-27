<?php
/**
* @version $Id$
* @package Joomla
* @copyright Copyright (C) 2005 - 2006 Open Source Matters. All rights reserved.
* @license GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

$params->set('intro_only', 1);
$params->set('hide_author', 1);
$params->set('hide_createdate', 0);
$params->set('hide_modifydate', 1);


// Disable edit ability icon
$access = new stdClass();
$access->canEdit    = 0;
$access->canEditOwn = 0;
$access->canPublish = 0;

$layout 		= $params->get('layout', 'default');
$link_titles 	= $params->get('link_titles', $mainframe->getCfg('link_titles'));

$list = modNewsFlashHelper::getList($params, $access);

// check if any results returned
$items = count($list);
if (!$items) {
	return;
}

require(JModuleHelper::getLayoutPath('mod_newsflash', $layout));
