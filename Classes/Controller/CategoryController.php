<?php

/***************************************************************
*  Copyright notice
*
*  (c) 	2009
*  		GreenBanana - www.greenbanana.ch
*  		Langhard <langhard@greenbanana.ch>
*  		
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
 * Controller for the Category object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_KiddogNews_Controller_CategoryController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_KiddogNews_Domain_Repository_CategoryRepository 
	 */
	protected $categoryRepository;
	
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction(){
		$this->categoryRepository = t3lib_div::makeInstance('Tx_KiddogNews_Domain_Repository_CategoryRepository');
		t3lib_div::debug('asdf');
	}
		
	/**
	 * list action
	 * @var Tx_KiddogNews_Domain_Model_Category $category
	 * @return string The rendered list action
	 */
	public function editAction(Tx_KiddogNews_Domain_Model_Category $category=NULL) {
		$this->view->assign('category', $category);
                t3lib_div::debug($this->settings['category']['root']);
		$this->view->assign('allCategories', $this->categoryRepository->findAll());
		$this->view->assign('rootCategorie', $this->settings['category']['root']);
	}
	
	/**
	 * update action
	 * @param Tx_KiddogNews_Domain_Model_Category $category
	 * @return string The rendered update action
	 */
	public function	updateAction(Tx_KiddogNews_Domain_Model_Category $editCategory) {
		$this->categoryRepository->update($editCategory);
		$this->redirect('edit', 'Category', NULL, array('category' => $editCategory));		
	}	
}
?>