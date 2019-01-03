<?php 
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";


if(!isset($_COOKIE['log']) && empty($_COOKIE['log'])){
    header("location: login.php");
    exit();
}else{
    View::header();
    ?>
    <script> var x = document.getElementById("user").style.color = 'red';</script>
    <?php
    if(isset($_COOKIE['log'])){
        $phone = $_COOKIE['log'];
        $phone = intval($phone);
        $sql = "SELECT * FROM customer WHERE phone = $phone ";
        $result = Database::query($sql) or die("Internal Error");
        $row = mysqli_fetch_assoc($result);
?>
<div class="log">
    <div class="img-pro"><img src="pictures/login.png" alt="profile" style="width:10em"></div>
    <ul>
        <li><span>Username:</span> <?php echo $row['username'];?></li>
        <li><span>Phone:</span> 0<?php echo $row['phone'];?></li>
        <li> <span>Address:</span> <?php echo $row['address'];?></li>
        <li><a href="logout.php">Log Out?</a></li>
    </ul>
</div>
<div class="continue"><a href='index.php'>Contionue Shopping</a></div>
<?php
    }
}
View::footer();