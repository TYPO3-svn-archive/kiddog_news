<?php
class Tx_KiddogNews_Controller_AjaxController{
	public function ajaxTestAction(){
		$ajaxObj  = t3lib_div::makeInstance('TYPO3AJAX', 'ajaxTestAction');
		$ajaxObj->addContent('content','ajaxTest');
		// var_dump($ajaxObj);
	}
}
?>