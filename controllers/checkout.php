<?php
session_start();
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
// echo "successfully bought!";
// unset($_SESSION['cart']);
if(!isset($_COOKIE['log'])){
    ?><script>alert("Please Register before checkout"); window.location = "register.php";</script><?php
    
}else{
    if(isset($_SESSION['cart'])){
        if(isset($_COOKIE['log'])) $phone = $_COOKIE['log'];
        $phone = intval($phone);
        

        // customer id
        $sql = "SELECT * FROM customer WHERE phone= '$phone' ";
        $result = Database::query($sql);
        $row = mysqli_fetch_assoc($result);
        $customerID = $row['id'];

        $item = $_SESSION['cart'];
        $cart_item = explode(',',$item);
        $r = array();
        for($i=0; $i<COUNT($cart_item); $i++){
            $r[] = explode(':',$cart_item[$i]);
            $itemID = $r[$i][0];
            $itemQty = $r[$i][1];
            $itemSize = $r[$i][2];

            $orderID = time().mt_rand(0,100);
            $orderDetailID = time().mt_rand(0,100);
            $date = date("d/m/Y").date(" h:i");
            $status = "requesting";

            // item price
            $sql = "SELECT * FROM upload_product WHERE id='$itemID' ";
            $result = Database::query($sql);
            $row = mysqli_fetch_assoc($result);
            $itemPrice = $row['price'];

            // order 
            $sql = "INSERT INTO orders(orderID,customerID,orderDate) VALUES($orderID,$customerID,'$date')";
            $result = Database::query($sql);

            // order detail
            $sql = "INSERT INTO orderdetails(orderDetailID,orderID,productID,quantity,price,size,status) VALUES($orderDetailID,$orderID,$itemID,$itemQty,$itemPrice,'$itemSize','$status');";
            $result = Database::query($sql);
        }
        
        if(!$result){
            die("Internal Error");
        }else{
            ?><script>alert("Successfully Checkout"); window.location = "success.php";</script><?php
            unset($_SESSION['cart']);
        }
            
        
        // $productID = "SELECT p.id FROM upload_product up INNER JOIN orderDetails od ON od.productID = p.id";
        // $customerID = "SELECT c.id FROM customer c INNER JOIN orders o ON o.customerID = c.id";
        // $orders = "SELECT oi.orderID FROM orders oi INNER JOIN orderDetails od ON od.orderID = oi.orderID";

    }
}
