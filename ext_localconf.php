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
		'File' 		=> 'new,delete,update',
		'Category' 	=> 'edit,new,delete,update',
		'Link' 		=> 'new,delete,update'
		),
	array(
		'Post' 		=> 'showLatest,showList,showArchiv,showRss,showSingle,new,create,edit,update,delete',
		'Comment' 	=> 'create,edit,update',
		'File' 		=> 'new,delete,save',
		'Category' 	=> 'edit,new,delete,update',
		'Link' 		=> 'new,delete,update'
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

// getCategoriesByParentUid
$TYPO3_CONF_VARS['BE']['AJAX']['Tx_KiddogNews_Controller_AjaxController::getCategoriesByParentUid']='EXT:kiddog_news/Classes/Controller/AjaxController.php:Tx_KiddogNews_Controller_AjaxController->getCategoriesByParentUid';

?>