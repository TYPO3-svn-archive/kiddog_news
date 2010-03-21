<?php

/***************************************************************
*  Copyright notice
*
*  (c) 	2010
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
 * Controller for the Link object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_KiddogNews_Controller_FileController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * new action
	 *
	 * @return string The rendered create action
	 */
	public function newAction() {
	}
		
	/**
	 * create action
	 *
	 * @return string The rendered create action
	 */
	public function createAction() {
	}
	
	/*
	 * Edit given comment
	 * 
	 * @param Tx_KiddogNews_Domain_Model_File $file
	 * @param Tx_KiddogNews_Domain_Model_Post $post
	 * @return void
	 */
	public function editAction(Tx_KiddogNews_Domain_Model_File $file, Tx_KiddogNews_Domain_Model_Post $post){
		$this->view->assign('file', $file);
		$this->view->assign('post', $post);
	}	

	/**
	 * Updates an existing file
	 *
	 * @param Tx_KiddogNews_Domain_Model_File $editFile The existing, unmodified file
	 * @param Tx_KiddogNews_Domain_Model_Post $post
	 * @return void
	 */
	public function updateAction(Tx_KiddogNews_Domain_Model_File $editFile, Tx_KiddogNews_Domain_Model_Post $post) {
		$this->fileRepository->update($editFile);
		$this->flashMessages->add('File update success');
		$this->redirect('edit', 'Post', NULL, array('post' => $post));
	}	
	
}
?>
