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
 * Category
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @scope prototype
 * @valueobject
 */


class Tx_KiddogNews_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var integer
	 */	
	protected $uid;
	
	/**
	 * @var string
	 */	
	protected $name;	
	
	/**
	 * @var string
	 */	
	protected $description;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Category>
	 */
	protected $subCategories;
	
	/**
	 * Image
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_KiddogNews_Domain_Model_Image>
	 */
	protected $image;

//	/**
//	 * @return the $foreignUid
//	 */
//	public function getForeignUid() {
//		return $this->foreignUid;
//	}
//
//	/**
//	 * @param $foreignUid the $foreignUid to set
//	 */
//	public function setForeignUid($foreignUid) {
//		$this->foreignUid = $foreignUid;
//	}	
	
	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param $name the $name to set
	 */
	public function setName($name) {
		$this->name = $name;
	}		

	/**
	 * @return the $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param $description the $description to set
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return the $subCategories
	 */
	public function getSubCategories() {
		return $this->subCategories;
	}

	/**
	 * @param $subCategories the $subCategories to set
	 */
	public function setSubCategories($subCategories) {
		$this->subCategories = $subCategories;
	}

	/**
	 * @return the $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param $image the $image to set
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns this post as a formatted string
	 * @return string
	 */
	public function __toString() {
		return 'name: '.$this->name;
	}	
	
}
?>