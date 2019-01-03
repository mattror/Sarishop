<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="shortcut icon" href="../pictures/favicon.ico">
        <link rel="stylesheet" href="css/log.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>
    
        <div class="loader">
            <div id="id01" class="modal">
                
                <form class="modal-content animate" action="loginprocess.php" method="post">
                    <div class="imgcontainer">
                        <img src="pictures/login.png" alt="Avatar" class="avatar">
                    </div>
                    <?php 
                    if(isset($_GET['message'])){
                        if($_GET['message']==1){
                            echo "<h3 style='color:red;text-align:center;'>Invalid</h3>";
                        }
                    }
                    ?>
                    <div class="container">
                        <h1>Login</h1>
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required >

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                        
                        <button type="submit" name="submit">Login</button>
                        <!-- <label><input type="checkbox" name="remember" > Remember me</label> -->
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <div class="cancelbtn"><a href="index.php">Cancel</a></div>
                        <span class="psw">Create an account?<a href="register.php"> Sign Up?</a></span>
                        <span class="psw">Forgot<a href="admin/forget.php"> password?</a></span>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>