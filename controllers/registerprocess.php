<?php
require_once "../libraries/database.class.php";
if(isset($_POST) && !empty($_POST)){
    $id = time().mt_rand(1,100);
    $user = $_POST['username'];
    $email = empty($_POST['email'])?'NA':$_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $phone = intval($phone);
    $pass = $_POST['password'];
    $pass = md5($pass);

    $sql = "SELECT * FROM customer WHERE phone = $phone OR username = '$user' ";
    $result = Database::query($sql);
    $count = mysqli_num_rows($result);
    if($count == 0){
        $sql = "INSERT INTO customer(id,username,password,phone,email,address) VALUES('$id','$user','$pass','$phone','$email','$address')";
        $result = Database::query($sql) or die("Internal Error");
        ?>
         <script>
            alert("Successfully registered!");
            window.location = "index.php";
        </script>
        <?php
    }else{
        header("location: register.php?message=1");
    }

}