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
 * Controller for the Post object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_KiddogNews_Controller_PostController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_KiddogNews_Domain_Repository_PostRepository 
	 */
	protected $postRepository;
	
	/**
	 * @var boolean 
	 */
	protected $isFeEditingAllowed;
	
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction(){
		$this->postRepository = t3lib_div::makeInstance('Tx_KiddogNews_Domain_Repository_PostRepository');
		$this->isFeEditingAllowed();
	}

    /**
     * Check if the current fe_user is allowed to edit/create posts
     */
    private function isFeEditingAllowed() {
        $gruppen = explode(",", $GLOBALS['TSFE']->fe_user->user[usergroup]);
        foreach($gruppen as $gruppe) {
            if ($gruppe==$this->settings['fe_usergroup']['admin']) {
                $this->isFeEditingAllowed = true;
                break;
            }
        }
    }	
	
	/**
	 * showLatest action
	 *
	 * @return string The rendered latest action
	 */
	public function	showLatestAction() {
		$this->view->assign('posts', $this->postRepository->findLatest($this->settings['time']['archiv']));
		$this->view->assign('isFeEditingAllowed', $this->isFeEditingAllowed);
	}
	
	/**
	 * showLatest action
	 *
	 * @return string The rendered list action
	 */
	public function	showListAction() {
		$this->view->assign('posts', $this->postRepository->findAll());
		$this->view->assign('isFeEditingAllowed', $this->isFeEditingAllowed);		
	}	

	/**
	 * Action that displays one single post
	 *
	 * @param Tx_KiddogNews_Domain_Model_Post $post The post to display
	 * @return string The rendered view
	 */
	public function showSingleAction(Tx_KiddogNews_Domain_Model_Post $post) {
		$this->view->assign('post', $post);
		$this->view->assign('editPost', $post);
		$this->view->assign('isFeEditingAllowed', $this->isFeEditingAllowed);		
	}	
	
	/**
	 * showArchiv action
	 *
	 * @return string The rendered archiv action
	 */
	public function showArchivAction() {
		$this->view->assign('posts', $this->postRepository->findArchived($this->settings['time']['archiv']));
		$this->view->assign('isFeEditingAllowed', $this->isFeEditingAllowed);	
	}
	
	/**
	 * Rss Feed Action rendering a RSS Feed
	 * @return string The rendered RSS Feed
	 */
	public function showRssAction() {
		$this->view->assign('posts', $this->postRepository->findAll());
	}

	/**
	 * Displays a form for creating a new post
	 *
	 * @param Tx_KiddogNews_Domain_Model_Post $newPost A fresh post object taken as a basis for the rendering
	 * @return string An HTML form for creating a new post
	 * @dontvalidate $newPost
	 */
	public function newAction(Tx_KiddogNews_Domain_Model_Post $newPost = NULL) {
			$this->view->assign('newPost', $newPost);
			$this->view->assign('date', date('d.m.Y h:m', time()));
			$this->view->assign('type', array( 0 => 'Post', 1 => 'Link'));			
	}	
	
	/**
	 * Creates a new post
	 * 
	 * @param Tx_KiddogNews_Domain_Model_Post $newPost
	 * @return void
	 */
	public function createAction(Tx_KiddogNews_Domain_Model_Post $newPost) {
		$this->postRepository->add($newPost);
		$this->flashMessages->add('Post was created');
		$this->redirect('showLatest', NULL, NULL, NULL);		
	}	
	
	/**
	 * edit action
	 * @param Tx_KiddogNews_Domain_Model_Post $post A fresh post object taken as a basis for the rendering
	 * @return string The rendered edit action
	 */
	public function	editAction(Tx_KiddogNews_Domain_Model_Post $post) {
		$this->view->assign('post', $post);
		$this->view->assign('type', array( 0 => 'Post', 1 => 'Link'));
		$this->view->assign('isFeEditingAllowed', $this->isFeEditingAllowed);	
	}	
	
	/**
	 * update action
	 * @param Tx_KiddogNews_Domain_Model_Post $post
	 * @return string The rendered update action
	 */
	public function	updateAction(Tx_KiddogNews_Domain_Model_Post $editPost) {
		$this->postRepository->update($editPost);
		$this->flashMessages->add('Post update success');
		$this->redirect('showLatest', NULL, NULL, NULL);		
	}
	
	/**
	 * delete action
	 * @param Tx_KiddogNews_Domain_Model_Post $post
	 * @return string The rendered delete action
	 */
	public function	deleteAction(Tx_KiddogNews_Domain_Model_Post $post) {
		$this->postRepository->remove($post);
		$this->redirect('showList', 'Post');
	}

}
?>