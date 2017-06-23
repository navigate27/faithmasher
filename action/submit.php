<?php
include("../config.php");

$id = rand(1000000,9999999);

while(!checkExists($id,$conn)){
	$id = rand(1000000,9999999);
}

function checkExists($id,$conn){
	$q = $conn->query("SELECT item_id FROM items WHERE item_id = '$id' ");
	if($q->num_rows==0){
		return true;
	}else{
		return false;
	}
}


$realname = $conn->real_escape_string($_POST['realname']);
$screenname = $conn->real_escape_string($_POST['screenname']);
$details = $conn->real_escape_string($_POST['details']);

$filename = $id;
$filename .= $_FILES['img']['name'];
$targetPath = "../img/".$filename;
if(move_uploaded_file($_FILES['img']['tmp_name'], $targetPath)){
	$query = $conn->query("
		INSERT INTO items (item_id,title,realname,details,date_added,img) VALUES('$id','$screenname','$realname','$details',now(),'$filename') ");
	if($query){
		$query2 = $conn->query("INSERT INTO items_score (item_id) VALUES('$id') ");
		if($query2){
			echo "ok";
		}
		
	}
}