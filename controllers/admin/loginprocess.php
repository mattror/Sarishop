<?php 
session_start();
require_once '../database/config.php'; 
if(isset($_POST) & !empty($_POST)){
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$pass = md5($pass);
	$result = query("SELECT * FROM admin_login WHERE adminName = '$user' AND Password = '$pass' ");
	$count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);

	if($r['adminName'] != $user && $r['Password'] != $pass){
		header("location: login.php?message=1");
	}else{
		header("location: admin.php");
		$_SESSION['user'] = $user;
	}
}