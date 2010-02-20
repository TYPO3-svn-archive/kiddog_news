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
 * Controller for the Comment object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_KiddogNews_Controller_CommentController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_KiddogNews_Domain_Model_CommentRepository
	 */
	protected $commentRepository;
	
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->commentRepository = t3lib_div::makeInstance('Tx_KiddogNews_Domain_Repository_CommentRepository');
	}	
	
	/**
	 * Action that adds a comment to a news post and redirects to single view
	 *
	 * @param Tx_KiddogNews_Domain_Model_Post $post The post the comment is related to
	 * @param Tx_KiddogNews_Domain_Model_Comment $newComment The comment to create
	 * @return void
	 */
	public function createAction(Tx_KiddogNews_Domain_Model_Post $post, Tx_KiddogNews_Domain_Model_Comment $newComment) {
		$post->addComment($newComment);
		$this->redirect('showSingle', 'Post', NULL, array('post' => $post));
	}

	/*
	 * Edit given comment
	 * 
	 * @param Tx_KiddogNews_Domain_Model_Comment $comment
	 * @param Tx_KiddogNews_Domain_Model_Post $post
	 * @return void
	 */
	public function editAction(Tx_KiddogNews_Domain_Model_Comment $comment, Tx_KiddogNews_Domain_Model_Post $post){
		$this->view->assign('comment', $comment);
		$this->view->assign('post', $post);
	}
		
	/**
	 * Updates an existing comment
	 *
	 * @param Tx_KiddogNews_Domain_Model_Comment $comment The existing, unmodified comment
	 * @param Tx_KiddogNews_Domain_Model_Post $post
	 * @return void
	 */
	public function updateAction(Tx_KiddogNews_Domain_Model_Comment $editComment, Tx_KiddogNews_Domain_Model_Post $post) {
		$this->commentRepository->update($editComment);
		$this->redirect('edit', 'Post', NULL, array('post' => $post));
	}		
}
?>
