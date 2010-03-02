<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Juerg Langhard <tschuege@greenbanana.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * The Backend controller for the ZALOM package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_KiddogNews_Controller_BackendController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * 
	 * @var unknown_type
	 */
	protected $postRepository;
	
	/**
	 * 
	 * @var unknown_type
	 */
	protected $commentRepository;
	
	/**
	 * 
	 * @var unknown_type
	 */
	protected $categoryRepository;
	
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->postRepository 		= t3lib_div::makeInstance('Tx_KiddogNews_Domain_Repository_PostRepository');
		$this->commentRepository 	= t3lib_div::makeInstance('Tx_KiddogNews_Domain_Repository_CommentRepository');
		$this->categoryRepository 	= t3lib_div::makeInstance('Tx_KiddogNews_Domain_Repository_CategoryRepository');
	}

	/**
	 * Index-Action
	 * 
	 * @return string
	 */
	public function indexAction() {
		if($this->settings['persistence']['storagePid']!=t3lib_div::GPvar('id')){
			$this->view->assign('error', 'No news on this site. (Use page with id='.$this->settings['persistence']['storagePid'].')'); //TODO:Sprache auslagern			
		}
	}
	
	public function overviewAction(){
		$this->view->assign('posts', $this->postRepository->findAll());
		$this->view->assign('comments', $this->commentRepository->findAll());
		
		//categories
		$this->view->assign('allCategories', $this->categoryRepository->findAll());
		$this->view->assign('rootCategorie', $this->settings['category']['root']);		
	}
	
	public function editPost(){
		t3lib_BEfunc::editOnClick(6,6,6);
	}

}

?>