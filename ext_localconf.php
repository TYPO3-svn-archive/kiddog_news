<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Post' 		=> 'showLatest,showList,showArchiv,showRss,showSingle,new,create,edit,update,delete',
		'Comment' 	=> 'create,edit,update',
		'File' 		=> 'new,create,edit,update',
		'Category' 	=> 'new,create,edit,update',
		'Link' 		=> 'new,create,edit,update'
		),
	array(
		'Post' 		=> 'showLatest,showList,showArchiv,showRss,showSingle,new,create,edit,update,delete',
		'Comment' 	=> 'create,edit,update',
		'File' 		=> 'new,create,edit,update',
		'Category' 	=> 'new,create,edit,update',
		'Link' 		=> 'new,create,edit,update'
		)
);

/**
 * Registration of ajax-methodes
 */

// deleteCategoryByUid
$TYPO3_CONF_VARS['BE']['AJAX']['Tx_KiddogNews_Controller_AjaxController::deleteCategoryByUid']='EXT:kiddog_news/Classes/Controller/AjaxController.php:Tx_KiddogNews_Controller_AjaxController->deleteCategoryByUid';

// updateCategoryByUid
$TYPO3_CONF_VARS['BE']['AJAX']['Tx_KiddogNews_Controller_AjaxController::updateCategoryByUid']='EXT:kiddog_news/Classes/Controller/AjaxController.php:Tx_KiddogNews_Controller_AjaxController->updateCategoryByUid';

// getCategoryByUid
$TYPO3_CONF_VARS['BE']['AJAX']['Tx_KiddogNews_Controller_AjaxController::getCategoryByUid']='EXT:kiddog_news/Classes/Controller/AjaxController.php:Tx_KiddogNews_Controller_AjaxController->getCategoryByUid';

// getCategoriesByForeignUid
$TYPO3_CONF_VARS['BE']['AJAX']['Tx_KiddogNews_Controller_AjaxController::getCategoriesByForeignUid']='EXT:kiddog_news/Classes/Controller/AjaxController.php:Tx_KiddogNews_Controller_AjaxController->getCategoriesByForeignUid';
?>