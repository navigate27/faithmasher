<?php

include("../../config.php");

$action = $_GET['action'];

switch ($action) {
	case 'reset_votes':
		resetVotes($conn);
		break;
	
	default:
		# code...
		break;
}


function resetVotes($conn){
	$query = $conn->query("UPDATE items_score SET wins = 0, lose = 0");
	if($query){
		echo "ok";
	}else{
		echo "failed";
	}

}