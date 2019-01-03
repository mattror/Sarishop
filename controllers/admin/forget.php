<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
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
        
                <form class="modal-content animate" action="forgetprocess.php" method="post">
                    <?php
                        if(isset($_GET['message'])){
                            if($_GET['message'] == 1){
                                echo "<h3>Invalid</h3>";
                            }
                        }
                    ?>
                    <div class="imgcontainer">
                        <img src="../pictures/login.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="securehint"><b>Hint</b></label>
                        <input type="number" id="securehint" placeholder="Enter Hint" name="hint" required >

                        <label for="secureQ"><b>Secure Question</b></label>
                        <input type="text" id="secureQ" placeholder="Enter Secure Question" name="secure" required>
                        
                        <button type="submit">Reset Password</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <div class="cancelbtn"><a href="../index.php">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>