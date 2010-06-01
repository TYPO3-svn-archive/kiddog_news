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
 * Post
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @package News
 * @subpackage Domain
 * @scope prototype
 * @entity
 */

class Tx_KiddogNews_Domain_Model_Post extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * Title
	 * @var string
	 * @validate StringLength(minimum = 3, maximum = 255)
	 */
	protected $title;

	/**
	 * Date
	 * @var DateTime
	 */
	protected $date;
	
	/**
	 * $tstamp
	 * @var DateTime
	 */
	protected $tstamp;
	
	/**
	 * Author
	 * @var string
	 */
	protected $author;
	
	/**
	 * Teaser
	 * @var string
	 */
	protected $teaser;
	
	/**
	 * Post
	 * @var string
	 * @validate NotEmpty
	 */
	protected $post;
	
	/**
	 * Type
	 * @var string
	 */
	protected $type;	
	
	/**
	 * Comments
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Comment>
	 */
	protected $comments;
	
	/**
	 * Categories
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Category>
	 */
	protected $categories;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Tag>
	 */
	protected $tags;	
	
	/**
	 * RelatedPosts
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Post>
	 */
	protected $relatedPosts;	
	
	/**
	 * Files
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_File>
	 */
	protected $files;
	
	/**
	 * Links
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Link>
	 */
	protected $links;
	
	/**
	 * Images
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_File>
	 */
	protected $images;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->date = new DateTime();
		
		if(!isset($this->type)){
			$this->type = 0;	
		}		
		
		// Alle ObjectStorages müssen hier initialisiert werden. 
		// Andernfalls entsteht ein Fehler beim speichern (über das FE).
		$this->comments 	= new Tx_Extbase_Persistence_ObjectStorage;
		$this->categories 	= new Tx_Extbase_Persistence_ObjectStorage;
		$this->relatedPosts = new Tx_Extbase_Persistence_ObjectStorage;
		$this->files 		= new Tx_Extbase_Persistence_ObjectStorage;
		$this->links 		= new Tx_Extbase_Persistence_ObjectStorage;
		$this->images 		= new Tx_Extbase_Persistence_ObjectStorage;
	}	
	
	/**
	 * Getter for Title
	 *
	 * @return string Title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Setter for Title
	 *
	 * @param string $Title Title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Getter for Date
	 *
	 * @return DateTime Date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Setter for Date
	 *
	 * @param DateTime $Date Date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}
	
	/**
	 * @return the $tstamp
	 */
	public function getTstamp() {
		return $this->tstamp;
	}

	/**
	 * Getter for Author
	 *
	 * @return string Author
	 */	
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Setter for Author
	 *
	 * @param string $Author Author
	 * @return void
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}
	
	/**
	 * Getter for Teaser
	 *
	 * @return string Teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Setter for Teaser
	 *
	 * @param string $Teaser Teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}
	
	/**
	 * Getter for Post
	 *
	 * @return string Post
	 */
	public function getPost() {
		return $this->post;
	}

	/**
	 * Setter for Post
	 *
	 * @param string $Post Post
	 * @return void
	 */
	public function setPost($post) {
		$this->post = $post;
	}
	
	/**
	 * Getter for Type
	 *
	 * @return string Type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Setter for Type
	 *
	 * @param string $Type Type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}	
	
	/**
	 * Getter for Comments
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Comment> Comments
	 */
	public function getComments() {
		return $this->comments;
	}

	/**
	 * Setter for Comments
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Comment> $Comments Comments
	 * @return void
	 */
	public function setComments(Tx_Extbase_Persistence_ObjectStorage $comments) {
		$this->comments = $comments;
	}
	
	 //TODO: ADD the "add"-method for the "ManyToMany" Relation as well
	/**
	 * Add a Comment
	 *
	 * @param Tx_KiddogNews_Domain_Model_Comment The Comment to add
	 * @return void
	 */
	public function addComment(Tx_KiddogNews_Domain_Model_Comment $comment) {
		$this->comments->attach($comment);
	}
	
	/**
	 * Setter for categories
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage $categories One or more Tx_KiddogNews_Domain_Model_Category objects
	 * @return void
	 */
	public function setCategories(Tx_Extbase_Persistence_ObjectStorage $categories) {
		$this->categories = clone $categories;
	}

	/**
	 * Adds a category to this post
	 *
	 * @param Tx_KiddogNews_Domain_Model_Category $category
	 * @return void
	 */
	public function addCategory(Tx_KiddogNews_Domain_Model_Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a category from this post
	 *
	 * @param Tx_KiddogNews_Domain_Model_Category $category
	 * @return void
	 */
	public function removeCategory(Tx_KiddogNews_Domain_Model_Category $category) {
		$this->categories->detach($category);
	}
	
	/**
	 * Remove all categories from this post
	 *
	 * @return void
	 */
	public function removeAllCategories() {
		$this->categories = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Getter for categories
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage A storage holding Tx_KiddogNews_Domain_Model_Category objects
	 */
	public function getCategories() {
		return clone $this->categories;
	}
	
	/**
	 * Getter for tags
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage A storage holding Tx_KiddogNews_Domain_Model_Tag objects
	 */
	public function getTags() {
		return clone $this->tags;
	}

	/**
	 * Returns the related posts
	 *
	 * @return An Tx_Extbase_Persistence_ObjectStorage holding instances of Tx_KiddogNews_Domain_Model_Post
	 */	
	public function getRelatedPosts() {
		return clone $this->relatedPosts;
	}	

	/**
	 * Setter for RelatedPosts
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Post> $RelatedPosts RelatedPosts
	 * @return void
	 */
	public function setRelatedPosts(Tx_Extbase_Persistence_ObjectStorage $relatedPosts) {
		$this->relatedPosts = $relatedPosts;
	}
	
	/**
	 * Getter for Files
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_File> Files
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * Setter for Files
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_File> $Files Files
	 * @return void
	 */
	public function setFiles(Tx_Extbase_Persistence_ObjectStorage $files) {
		$this->files = $files;
	}
	
	 //TODO: ADD the "add"-method for the "ManyToMany" Relation as well
	/**
	 * Add a File
	 *
	 * @param Tx_KiddogNews_Domain_Model_File The File to add
	 * @return void
	 */
	public function addFile(Tx_KiddogNews_Domain_Model_File $file) {
		$this->files->attach($file);
	}
	
	/**
	 * Getter for Links
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Link> Links
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Setter for Links
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Link> $Links Links
	 * @return void
	 */
	public function setLinks(Tx_Extbase_Persistence_ObjectStorage $links) {
		$this->links = $links;
	}
	
	 //TODO: ADD the "add"-method for the "ManyToMany" Relation as well
	/**
	 * Add a Link
	 *
	 * @param Tx_KiddogNews_Domain_Model_Link The Link to add
	 * @return void
	 */
	public function addLink(Tx_KiddogNews_Domain_Model_Link $link) {
		$this->links->attach($link);
	}
	
	/**
	 * Getter for Images
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_File> Images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Setter for Images
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_File> $Images Images
	 * @return void
	 */
	public function setImages(Tx_Extbase_Persistence_ObjectStorage $images) {
		$this->images = $images;
	}
	
	//TODO: ADD the "add"-method for the "ManyToMany" Relation as well
	/**
	 * Add a File
	 *
	 * @param Tx_KiddogNews_Domain_Model_File The File to add
	 * @return void
	 */
	public function addImage(Tx_KiddogNews_Domain_Model_File $image) {
		$this->images->attach($image);
	}

	/**
	 * Returns this post as a formatted string
	 * @return string
	 */
	public function __toString() {
		return $this->title;
	}	
}
?>