<?php
class View{
    public static function header(){
        include "../views/templates/header_view.php";
    }
    public static function viewSlide($view, $data = []){
        extract($data);
        include "../views/".$view."_view.php";
    }
    public static function newArrival($view, $data = []){
        extract($data);
        include "../views/".$view."_view.php";
    }
    public static function viewSearch($view, $data = []){
        extract($data);
        include "../views/".$view."_view.php";
    }
    public static function footer(){
        include "../views/templates/footer_view.php";
    }
}
