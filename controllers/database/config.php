<?php

function query($sql){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "sari";
    $port = 3306; // defalut port
    $con = mysqli_connect($server,$username,$password,$db,$port);
    if(!$con){
        die("Connection to Mysql failed");
    }
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}