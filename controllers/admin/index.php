<!DOCTYPE html>
<html>
    <head>
        <title>Matt Dev</title>
        <link rel="shortcut icon" href="pictures/favicon.ico">
        <style>
            body{
                font-family: Arial;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            a{
                text-decoration: none;
                color: #ffffff;
                margin: 2%;
            }
            a:hover{
                color: #1979CA;
            }
            .wrapper{
                width: 50%;
                padding: 2%;
                border-radius: 5px;
                background: #1e1e1e;
                color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php header("location: login.php");
            ?>
        </div>
    </body>
</html>