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
 * Comment
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_KiddogNews_Domain_Model_Comment extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * Date
	 * @var DateTime
	 */
	protected $date;
	
	/**
	 * Name
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;
	
	/**
	 * EMail
	 * @var string
	 */
	protected $eMail;
	
	/**
	 * Website
	 * @var string
	 */
	protected $website;
	
	/**
	 * Comment
	 * @var string
	 * @validate NotEmpty
	 */
	protected $comment;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->date = new DateTime();
	}
	
	/**
	 * @return the $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param $date the $date to set
	 */
	public function setDate($date) {
		$this->date = $date;
	}

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
	 * @return the $eMail
	 */
	public function getEMail() {
		return $this->eMail;
	}

	/**
	 * @param $eMail the $eMail to set
	 */
	public function setEMail($eMail) {
		$this->eMail = $eMail;
	}

	/**
	 * @return the $website
	 */
	public function getWebsite() {
		return $this->website;
	}

	/**
	 * @param $website the $website to set
	 */
	public function setWebsite($website) {
		$this->website = $website;
	}

	/**
	 * @return the $comment
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * @param $comment the $comment to set
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

}
?>