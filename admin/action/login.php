<?php

include("../../config.php");

$user = $_POST['username'];
$pass = $_POST['password'];


$query = $conn->query("SELECT * FROM admin_account WHERE username = '$user' AND password = '$pass' ");
if($query->num_rows!=0){
	while($rows=$query->fetch_assoc()){
		session_start();
		$_SESSION['username'] = $rows['username'];
		$_SESSION['name'] = $rows['name'];
		header("location: ../index.php");
	}
}else{
	header("location: ../login.php?error=true");
}
