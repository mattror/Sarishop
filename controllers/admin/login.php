<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="shortcut icon" href="../pictures/favicon.ico">
        <link rel="stylesheet" href="../css/log.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>

        <div class="loader">
            <div id="id01" class="modal">
        
                <form class="modal-content animate" action="loginprocess.php" method="post">
                    <?php
                        if(isset($_GET['message'])){
                            if($_GET['message'] == 1){
                                echo "<h3>Invalid Login</h3>";
                            }
                        }
                    ?>
                    <div class="imgcontainer">
                        <img src="../pictures/login.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required value="<?=isset($_POST["username"])?$_POST["username"]:""?>">

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                        
                        <button type="submit" name="submit">Login</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <div class="cancelbtn"><a href="../index.php">Cancel</a></div>
                        <span class="psw">Forgot <a href="forget.php">password?</a></span>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>