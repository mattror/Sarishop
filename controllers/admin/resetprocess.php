<?php
session_start();
require_once "../database/config.php";
if(isset($_POST)){
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];
    $new = md5($new);
    $confirm = md5($confirm);
    $sql = "SELECT * FROM admin_login WHERE Password = '$new' ";
    $result = query($sql);
    if($result){
        $r = mysqli_fetch_assoc($result);
        if($r['Password'] == $new){
            echo "<a href='login.php'>Login?</a>";
        }
    }
    if($new != $confirm){
        header("location: reset.php?message=1");
    }else{
        $sql = "UPDATE admin_login SET Password = '$new' ";
        $result = query($sql);
        header("location: logout.php");
    }
    
}