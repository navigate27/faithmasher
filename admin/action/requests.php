<?php

include("../../config.php");

$action = $_GET['action'];

switch ($action) {
	case 'approve_items':
		$items = $_GET['data'];
		approveItems($items,$conn);
		break;
	
	default:
		# code...
		break;
}


function approveItems($items,$conn){
	$validator = 0;
	foreach($items as $item){
		$id = $item['id'];
		$app_item = $conn->query("UPDATE items SET allow = 1 WHERE item_id = '$id' ");
		if($app_item){
			$validator++;
		}else{
			$validator--;
		}
	}

	if($validator==count($items)){
		echo "ok";
	}else{
		echo "failed";
	}

}