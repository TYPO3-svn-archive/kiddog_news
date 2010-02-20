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
 * Repository for Tx_KiddogNews_Domain_Model_Post
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_KiddogNews_Domain_Repository_CategoryRepository extends Tx_Extbase_Persistence_Repository {
  
	public function findCategoryHierarchy(){
		$query = $this->createQuery('SELECT 
		KK1.name,
		KK1.uid,
		KK1.foreign_uid,
		KK2.name subname,
		KK2.uid subuid,
		KK2.foreign_uid subforeign_uid 
		FROM tx_kiddognews_domain_model_category AS KK1
		INNER JOIN tx_kiddognews_domain_model_category AS KK2
		ON KK1.uid = KK2.foreign_uid');
//		$hierarchy[0] = $query->matching($query->equals('uid', $category))
//			->setOrderings(array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING))
//			->execute();
//			
//		
//		return $hierarchy;

		return $query->execute();
  	}
}
?>