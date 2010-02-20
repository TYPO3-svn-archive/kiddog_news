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
 * File
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_KiddogNews_Domain_Model_File extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * Title
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;
	
	/**
	 * File
	 * @var string
	 * @validate NotEmpty
	 */
	protected $file;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		
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
	 * @param string $title Title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Getter for File
	 *
	 * @return string File
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * Setter for File
	 *
	 * @param string $File File
	 * @return void
	 */
	public function setFile($file) {
		$this->file = $file;
	}
	
}
?>