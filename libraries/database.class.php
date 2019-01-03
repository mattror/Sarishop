<?php
class Database{
    public static function query($sql){
        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "sari";
        $port = 3306; // defalut port
        $con = mysqli_connect($server,$username,$password,$db,$port);
        if(!$con){
            return false;
        }
        $result = mysqli_query($con,$sql);
        mysqli_close($con);
        return $result;
    }
}