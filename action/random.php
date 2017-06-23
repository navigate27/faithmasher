<?php
include("../config.php");

$ids = array();
$results = array();

$getId = $conn->query("SELECT item_id FROM items WHERE allow = 1");
if($getId->num_rows!=0){
	while($rows=$getId->fetch_assoc()){
		$ids[] = $rows;
	}
}

$index1 = 0;
$index2 = 0;
while(!checkEqual($index1,$index2)){
	$index1 = rand(0,count($ids)-1);
	$index2 = rand(0,count($ids)-1);
}

$left = $ids[$index1];
$right = $ids[$index2];

$left = implode($left);
$right = implode($right);

function checkEqual($index1,$index2){
	if($index1!=$index2){
		return true;
	}else{
		return false;
	}
}

$getRandom1 = $conn->query("
	SELECT * FROM items 
	JOIN items_score 
	ON items.item_id = items_score.item_id 
	WHERE items.item_id = '$left' ");
if($getRandom1->num_rows!=0){
	while($rows=$getRandom1->fetch_assoc()){
		$results['candidate_1'][] = array(
			"score_id" => $rows['item_score_id'],
			"title" => $rows['title'],
			"realname" => $rows['realname'],
			"img" => $rows['img'],
			"wins" => $rows['wins'],
			"lose" => $rows['lose']
			);
	}
}

$getRandom2 = $conn->query("
	SELECT * FROM items 
	JOIN items_score 
	ON items.item_id = items_score.item_id 
	WHERE items.item_id = '$right' ");
if($getRandom2->num_rows!=0){
	while($rows=$getRandom2->fetch_assoc()){
		$results['candidate_2'][] = array(
			"score_id" => $rows['item_score_id'],
			"title" => $rows['title'],
			"realname" => $rows['realname'],
			"img" => $rows['img'],
			"wins" => $rows['wins'],
			"lose" => $rows['lose']
			);
	}
}

header("content-type: application/json");
echo json_encode($results);