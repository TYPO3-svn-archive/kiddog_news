<?php

/**
 * This class is a image view helper for the Fluid templating engine.
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class Tx_KiddogNews_ViewHelpers_LightboxViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

    /**
     * Renders some classic dummy content: Lorem Ipsum...
     *
     * @param int $lenght The number of characters of the dummy content
     * @validate $lenght IntegerValidator
     * @return string dummy content, cropped after the given number of characters
     * @author Lorem Ipsum <lorem@example.com>
     */
    public function render($image) {
    	$imageTitle='TEST';
    	$imageId=2;
    	$imageDescription='Dummy Ipsum dolor sit amet';
    	// Include from CSS and JS for jQuery.tools
		$GLOBALS['TSFE']->additionalHeaderData[kiddog_news] = '<script type="text/javascript" src="'.t3lib_extMgm::extRelPath(kiddog_news).'Resources/Public/JavaScripts/jQuery/jquery.tools.min.js"></script>';
		$GLOBALS['TSFE']->additionalHeaderData[kiddog_news] = '<script type="text/javascript" src="'.t3lib_extMgm::extRelPath(kiddog_news).'Resources/Public/JavaScripts/jQuery/overlayconfig.js"></script>';
		$GLOBALS['TSFE']->additionalHeaderData[kiddog_news] .= '<link rel="stylesheet" type="text/css" href="'.t3lib_extMgm::extRelPath(kiddog_news).'Resources/Public/CSS/jquery.tools.overlay-apple.css"/>';
		$GLOBALS['TSFE']->additionalHeaderData[kiddog_news] .= '<link rel="stylesheet" type="text/css" href="'.t3lib_extMgm::extRelPath(kiddog_news).'Resources/Public/CSS/overlayconfig.css"/>';		
		$GLOBALS['TSFE']->additionalHeaderData[kiddog_news] .= '<!--[if lt IE 7]>
																	<link rel="stylesheet" type="text/css" href="'.t3lib_extMgm::extRelPath(kiddog_news).'Resources/Public/CSS/overlayconfigIE7.css"/>
																<![endif]-->';
        
		return '<div class="apple_overlay black" id="'.$imageId.'">
					<img src="'.$image.'" />
					<div class="details">
						<h2>'.$imageTitle.'</h2>
						<p>
							'.$imageDescription.'
						</p>
					</div>
				</div>
				';
    }
}
?>