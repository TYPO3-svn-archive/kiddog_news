<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

/** ********************************************************************************** 
 * Backen-Modul
 ********************************************************************************** **/
if (TYPO3_MODE === 'BE')	{
	/**
	* Registers a Backend Module
	*/
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'web',					// Make module a submodule of 'web'
		'tx_kiddognews_m1',		// Submodule key
		'',						// Position
		array(																			// An array holding the controller-action-combinations that are accessible
			'Backend' => 'index,overview',
			),
		array(
			'access' => 'admin',
			'icon'   => 'EXT:kiddog_news/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml',
		)
	);
}

/** ********************************************************************************** 
 * Frontend-Plugin
 ********************************************************************************** **/

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,																	
	'Pi1',																		
	'News-System'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'News-System');

t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_post');
$TCA['tx_kiddognews_domain_model_post'] = array (
	'ctrl' => array (
		'title'             => 'Post',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_post.png'
	)
);


t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_comment');
$TCA['tx_kiddognews_domain_model_comment'] = array (
	'ctrl' => array (
		'title'             => 'Comment', 
		'label' 			=> 'date',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_comment.png'
	)
);


t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_category');
$TCA['tx_kiddognews_domain_model_category'] = array (
	'ctrl' => array (
		'title'             => 'Category',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_category.png'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_tag');
$TCA['tx_kiddognews_domain_model_tag'] = array (
	'ctrl' => array (
		'title'             => 'Tag',
		'label'				=> 'name',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'delete'            => 'deleted',
		'enablecolumns'     => array (
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_tag.png'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_file');
$TCA['tx_kiddognews_domain_model_file'] = array (
	'ctrl' => array (
		'title'             => 'File', 
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_file.png'
	)
);


t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_image');
$TCA['tx_kiddognews_domain_model_image'] = array (
	'ctrl' => array (
		'title'             => 'Image',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php', 
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_image.png' 
	)
);


t3lib_extMgm::allowTableOnStandardPages('tx_kiddognews_domain_model_link');
$TCA['tx_kiddognews_domain_model_link'] = array (
	'ctrl' => array (
		'title'             => 'Link',
		'label' 			=> 'link',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_kiddognews_domain_model_link.png'
	)
);

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');


?>
