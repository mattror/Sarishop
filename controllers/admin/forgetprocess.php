<?php 
session_start();
require_once '../database/config.php'; 
if(isset($_POST) & !empty($_POST)){
	$hint = $_POST["hint"];
	$secure = $_POST["secure"];
	$result = query("SELECT * FROM admin_login WHERE secureHint = '$hint' AND secureQuestion = '$secure' ");
	$count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);

	if($r['secureHint'] != $hint && $r['secureQuestion'] != $secure){
		header("location: forget.php?message=1");
	}else{
		header("location: reset.php");
	}
}