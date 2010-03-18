<?php
$node = "";

if (isset($_REQUEST["node"])) {
	$node = $_REQUEST["node"];
}else{
	var_dump($_REQUEST);	
}

switch ($node) {
	case "setCategoryByUid";
		setCategoryByUid($_REQUEST["TxKiddognewsDomainModelCategory"]);
		break;
	case "getCategoryByUid":
			getCategoryInfoByUid($_REQUEST["category"]);
		break;	
	case "getCategoriesByParent":
			getCategoriesByParent();
		break;	
	default:
			getCategoriesByParent($node);
}

/**
 * Generate data for tree-view
 * 
 * @param unknown_type $node
 * @return unknown_type
 */
function getCategoriesByParent($node=1) {
	$con = mysql_connect("localhost","root","");
	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}

	mysql_select_db("T3debug", $con);

	$result = mysql_query(
		"SELECT name, uid
		FROM tx_kiddognews_domain_model_category
		WHERE foreign_uid =".$node
	);

	$categories = '[';
	while($row = mysql_fetch_array($result)){
		$categories .= '{"text":"'.$row['name'].'","id":"'.$row['uid'].'","iconCls":"folder","draggable":false},';
  	}
	$categories .= ']';
  	mysql_close($con);

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


/**
 * Get data of a given category-uid
 * @return unknown_type
 */
function getCategoryInfoByUid($uid){
	$con = mysql_connect("localhost","root","");
	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}

	mysql_select_db("T3debug", $con);

	$result = mysql_query(
		"SELECT name, uid, description, foreign_uid
		FROM tx_kiddognews_domain_model_category
		WHERE uid =".$uid
	);

	$category = '[';
	while($row = mysql_fetch_array($result)){
		$category .= '{"name":"'.$row['name'].'","uid":"'.$row['uid'].'","description":"'.$row['description'].'","foreignUid":"'.$row['foreign_uid'].'"}';
  	}
	$category .= ']';
  	mysql_close($con);	
	echo utf8_encode($category);
}


/**
 * 
 * @param $uid
 */
function setCategoryByUid($category){
	
	$con = mysql_connect("localhost","root","");
	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}

	mysql_select_db("T3debug", $con);

	mysql_query(
		'UPDATE tx_kiddognews_domain_model_category
		SET name="'.$category['name'].'",
			description="'.$category['description'].'",
			foreign_uid="'.$category['foreignUid'].'"
		WHERE uid='.$category['uid']
	);	
	
  	mysql_close($con);		
}
?>