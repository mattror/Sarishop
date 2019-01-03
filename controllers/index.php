<?php
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
View::header();

if (isset($_GET["search"])){
    require_once "../controllers/search.php";
    View::footer();
    exit();
}

// slide
$slide = User::slide();
$data = array(
    "slide" => $slide,
);
View::viewSlide("slide",$data);

// new arrival
$arrival = User::arrival();
$data = array(
    "arrival" => $arrival,
);
View::newArrival("newarrival",$data);

// female
$female = User::female();
$data = array(
    "female" => $female,
);
View::newArrival("female",$data);

// male
$male = User::male();
$data = array(
    "male" => $male,
);
View::newArrival("male",$data);

// kid
$kid = User::kid();
$data = array(
    "kid" => $kid,
);
View::newArrival("kid",$data);

// purse
$purse = User::purse();
$data = array(
    "purse" => $purse,
);
View::newArrival("purse",$data);

// shoes
$shoes = User::shoes();
$data = array(
    "shoes" => $shoes,
);
View::newArrival("shoes",$data);

View::footer();


