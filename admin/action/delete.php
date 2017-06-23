<?php

include("../../config.php");

$action = $_GET['action'];

switch ($action) {
	case 'delete_items':
		$items = $_GET['data'];
		deleteItems($items,$conn);
		break;
	
	default:
		# code...
		break;
}


function deleteItems($items,$conn){
	$validator = 0;
	foreach($items as $item){
		$id = $item['id'];
		$img = $item['img'];
		$del_item = $conn->query("DELETE FROM items WHERE item_id = '$id' ");
		if($del_item){
			$del_item_score = $conn->query("DELETE FROM items_score WHERE item_id = '$id' ");
			if($del_item_score){
				if(unlink("../../img/".$img)){
					$validator++;
				}else{
					$validator--;
				}
			}
		}
	}

	if($validator==count($items)){
		echo "ok";
	}else{
		echo "failed";
	}

}