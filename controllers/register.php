<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="shortcut icon" href="pictures/favicon.ico">
        <link rel="stylesheet" href="css/log.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>

        <div class="loader">
            <div id="id01" class="modal">
        
                <form class="modal-content animate" action="registerprocess.php" method="post">
                    <div class="container">
                        <h1>Register</h1>
                        Please fill in this form to create an account.
                        <?php 
                        if(isset($_GET['message'])){
                            if($_GET['message']==1){
                                echo "<h5 style='color:red'>phone number and username is duplicate</h5>";
                            }
                        }
                        ?>
                    </div>
                    <div class="container">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Username" id="username" name="username" required value="<?=isset($_POST["username"])?$_POST["username"]:""?>">

                        <label for="email"><b>Email</b></label>
                        <input type="email" id="email" placeholder="E-mail" name="email">

                        <label for="address"><b>Current Address</b></label>
                        <input type="text" id="address" placeholder="Current Address" name="address" required>

                        <label for="phone"><b>Phone Number</b></label>
                        <input type="number" id="phone" placeholder="Phone Number" name="phone" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" id="password" placeholder="Password" name="password" required>
                        
                        <button type="submit" name="submit">Register</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <div class="cancelbtn"><a href="index.php">Cancel</a></div>
                        <span class="psw">Already have an account? <a href="login.php">Sign In?</a></span>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>