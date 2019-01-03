<?php 
session_start();
require_once '../libraries/database.class.php'; 
if(isset($_POST) & !empty($_POST)){
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$pass = md5($pass);
	$result = Database::query("SELECT * FROM customer WHERE username = '$user' AND password = '$pass' ");
	$r = mysqli_num_rows($result);
	if($r ==0 ){
		header("location: login.php?message=1");
	}else{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['log'] = $row['phone'];
		setcookie("log",$row['phone'],time()+(60*60));
		header("location: myaccount.php");
	}
}