<?php
$node = "";

if (isset($_REQUEST["node"])) {
	$node = $_REQUEST["node"];
}

switch ($node) {
	case "getCategoryInfoByUid":
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

	$tree = '[';
	while($row = mysql_fetch_array($result)){
		$tree .= '{"text":"'.$row['name'].'","id":"'.$row['uid'].'","iconCls":"folder","draggable":false},';
  	}
	$tree .= ']';
  	mysql_close($con);

	/**
	 * 	[
	 *	{"text":"Data Sources","id":"datasources","iconCls":"folder","draggable":false},
	 *	{"text":"Datasets","id":"datasets","iconCls":"folder","draggable":false},
	 *	{"text":"Executive Reports","id":"execreports","iconCls":"folder","draggable":false},
	 *	{"text":"Reports","id":"reports","iconCls":"folder","draggable":false}
	 *	]
	 */
	
	echo utf8_encode($tree);
}


/**
 * Get data of a given category-uid
 * @return unknown_type
 */
function getCategoryInfoByUid($uid) {
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

	$categoryInfos = '[';
	while($row = mysql_fetch_array($result)){
		$categoryInfos .= '{"name":"'.$row['name'].'","id":"'.$row['uid'].'","description":"'.$row['description'].'","foreignUid":"'.$row['foreign_uid'].'"}';
  	}
	$categoryInfos .= ']';
  	mysql_close($con);	
	echo utf8_encode($categoryInfos);
}

?>