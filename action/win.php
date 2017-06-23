<?php

include("../config.php");

$win = $_GET['win'];
$lose = $_GET['lose'];

$setWin = $conn->query("UPDATE items_score SET wins = wins+1 WHERE item_score_id = '$win' ");
if($setWin){
	$setLose = $conn->query("UPDATE items_score SET lose = lose+1 WHERE item_score_id = '$lose' ");
	if($setLose){
		echo "ok";
	}else{
		echo "failed";
	}
}
