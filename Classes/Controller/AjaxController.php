<?php
$node = "";
$out = "";

if (isset($_REQUEST["node"])) {
	$node = $_REQUEST["node"];
}

switch ($node) {

	case "project":
		$out = getCategoriesByParent();
		break;
	default:
		$out = getCategoriesByParent($node);

}
echo utf8_encode($out);

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
	
	return $tree; 
}

?>