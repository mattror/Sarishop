<?php
session_start();
setcookie("log","",time()-3600);
setcookie("remember_name","",time()-3600);
setcookie("remember_pass","",time()-3600);
unset($_SESSION['log']);
session_destroy ();
header("location: index.php");