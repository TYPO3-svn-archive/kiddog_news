<?php
class Tx_KiddogNews_Controller_AjaxController{
	
	// Parameters
	protected $tx_kiddognews_ajax;
	
	public function __construct(){
		$this->tx_kiddognews_ajax = t3lib_div::_GP('tx_kiddognews_ajax');
	}
	
	/** **********************************************************************************************
	 * Delete category by given uid ($_GP[tx_kiddognews_ajax]['uid'])
	 ********************************************************************************************** */
	public function deleteCategoryByUid(){
		// Mark category as deleted
		$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_kiddognews_domain_model_category', 'uid='.$this->tx_kiddognews_ajax['uid'], array('deleted' => 1));
	 	echo $res;
	}

	/** **********************************************************************************************
	 * Up date category by given uid ($_GP[tx_kiddognews_ajax]['uid'])
	 ********************************************************************************************** */	
	public function updateCategoryByUid(){
		$updateArray = array(
			'name'			=> $this->tx_kiddognews_ajax['category']['name'],
			'description' 	=> $this->tx_kiddognews_ajax['category']['description'],
			'foreign_uid'	=> $this->tx_kiddognews_ajax['category']['foreignUid']
		);
		$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_kiddognews_domain_model_category', 'uid='.$this->tx_kiddognews_ajax['uid'], $updateArray);  	
	}
	
	/** **********************************************************************************************
	 * Get category by given uid ($_GP[tx_kiddognews_ajax]['uid'])
	 ********************************************************************************************** */	
	public function getCategoryByUid(){
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
                	'name, uid, description, foreign_uid',
                	'tx_kiddognews_domain_model_category',
                	'uid ='.$this->tx_kiddognews_ajax['uid'],
                	'',
                	'',
                	''            
            	);	
	
		$category = '[';
		while($row = mysql_fetch_array($res)){
			$category .= '{"name":"'.$row['name'].'","uid":"'.$row['uid'].'","description":"'.$row['description'].'","foreignUid":"'.$row['foreign_uid'].'"}';
	  	}
		$category .= ']';
		echo utf8_encode($category);		
	}	
	
	/** **********************************************************************************************
	 * Get category by given uid ($_GP[tx_kiddognews_ajax]['uid'])
	 ********************************************************************************************** */	
	public function getCategoriesByForeignUid() {
		
		// Workaround for the foreignUid
		$node = t3lib_div::_GP('node');
		if($node=='root'){
			$this->tx_kiddognews_ajax['foreignUid'] = 1;
		}
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
                	'name, uid',
                	'tx_kiddognews_domain_model_category',
                	'foreign_uid ='.$this->tx_kiddognews_ajax['foreignUid'],
                	'',
                	'name',
                	''           
            	);		

		$categories = '[';
		while($row = mysql_fetch_array($res)){
			$categories .= '{"text":"'.$row['name'].'","id":"'.$row['uid'].'","iconCls":"folder","draggable":false},';
	  	}
		$categories .= ']';
		
		/**
		 * 	[
		 *	{"text":"Data Sources","id":"datasources","iconCls":"folder","draggable":false},
		 *	{"text":"Datasets","id":"datasets","iconCls":"folder","draggable":false},
		 *	{"text":"Executive Reports","id":"execreports","iconCls":"folder","draggable":false},
		 *	{"text":"Reports","id":"reports","iconCls":"folder","draggable":false}
		 *	]
		 */
		
		echo utf8_encode($categories);
	}	
}
?>