<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/adminStyle.css" type="text/css">
    <link rel="shortcut icon" href="../pictures/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> <!-- Lato -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <!-- Roboto -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php date_default_timezone_set('Asia/Phnom_Penh');?>
</head>
<body>

    <!-- Go To Top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- auto refresh -->
    <script>
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 10000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000);
</script>
    
    <!--Sticky Nav-->
    <div class="header-sticky">
        <!--Nav Bar-->
        <div class="nav-bar">
            <div class="logo-bar"><a href="admin.php"><img src="../pictures/surinam.png" alt="logo"></a></div>
        </div>
        <div class="menu">
            <ul>
            <li>
                <a id ="dashboard" href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a id="category" href="#">Category</a> 
                <ul>
                    <li><a id="order" href="order.php">Order</a></li>
                    <li><a href="upload_product.php">Upload&nbsp;Product</a></li>
                    <li><a href="slide.php">Upload&nbsp;Slide</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
    <div class="wrapper">