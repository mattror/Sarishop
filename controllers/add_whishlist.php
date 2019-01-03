<?php
session_start();
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";

if(isset($_GET['id'])){
    if(isset($_COOKIE['log'])){
        $phone = $_COOKIE['log'];
        $phone = intval($phone);
    }else{
        ?><script>alert("Please create account before add to wishlist!"); window.location = "myaccount.php";</script> <?php
    }

    $productID = $_GET['id'];
    $wishID = time().mt_rand(0,100);
    $wishDate = date("d/m/Y").date(" h:i");
    $wishStatus = "visible";

    // check if product wishlist is already exist
    $sql = "SELECT * FROM wishlist WHERE productID = $productID AND wishStatus='visible' ";
    $result = Database::query($sql);
    $row = mysqli_num_rows($result);
    if( $row >0){
        ?> <script>alert("This Item is already in wishlist!"); window.location = "whishlist.php"; </script><?php
        var_dump($result);
        exit;
    }else{

        // customer id
        $sql = "SELECT * FROM customer WHERE phone=$phone"; 
        $result = Database::query($sql);
        $row = mysqli_fetch_assoc($result);
        $customerID = $row['id'];

        $sql = "INSERT INTO wishlist(wishID,customerID,productID,wishDate,wishStatus) VALUES($wishID,$customerID,$productID,'$wishDate','$wishStatus')";
        $result = Database::query($sql);
        if(!$result){
            View::header();
        ?>    <div class="empty-bag">
                <h1>Unable to add to wishlist!</h1>
                <div class="continue"><a href='index.php'>Contionue Shopping</a></div>
            </div> 
        <?php
        View::footer();
        }
        ?><script>alert("Added to wishlist!"); window.location = "whishlist.php";</script> <?php
    }
}