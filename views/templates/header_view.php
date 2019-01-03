<!DOCTYPE html>
<html>
<head>
    <title>Sari Cloth Shop</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="shortcut icon" href="pictures/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> <!-- Lato -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <!-- Roboto -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php date_default_timezone_set('Asia/Phnom_Penh');?>
    <!-- Go To Top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
     <script>
        function topFunction() {
            currentYOffset = self.pageYOffset;
            initYOffset = currentYOffset;

            var intervalId = setInterval(function(){
                currentYOffset -= initYOffset*0.03; 
                document.body.scrollTop = currentYOffset ;
                document.documentElement.scrollTop = currentYOffset;

                if(self.pageYOffset == 0){
                clearInterval(intervalId);
                }
            }, 20);
        }
    </script> 
    <!-- hidden navbar -->
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("stick-bar").style.top = "0";
                if (document.body.scrollTop < 200 || document.documentElement.scrollTop < 100) {
                    document.getElementById("myBtn").style.display = "none";
                }
                
            } else {
                document.getElementById("stick-bar").style.top = "-100%";
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 100) {
                    document.getElementById("myBtn").style.display = "block";
                }
            }
            prevScrollpos = currentScrollPos;
            
        }
    </script>
</head>
<body>
    <!--Sticky Nav-->
    <div class="header-sticky" id="stick-bar" onscroll="hidden()">
        <!--Nav Bar-->
        <div class="nav-bar">
            <div class="logo-bar"><a href="index.php"><img src="pictures/surinam.png" alt="logo"></a></div>
            <!-- search bar -->
            <div class="search-bar">
                <form action="search.php" method="get">
                    <select class="categ submit" name="c">
                        <option value="all" selected>All</option>
                        <option value="cloth">Cloth</option>
                        <option value="shoes">Shoes</option>
                        <option value="purse">Purse</option>
                    </select>
                    <input type="text" placeholder="Search" class="search" required name="q" value="<?=isset($_GET["keyword"])?$_GET["keyword"]:"";?>"
                    onkeyup="showResult(this.value)" >
                    <button type="submit" class="submit" ><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- user utility -->
            <div class="user-utility-bar">
                <div class="like"><a href="whishlist.php"><i class="fa fa-heart-o badge" id="wishlist"></i></a></div>
                <div class="like bag"><a href="bag.php"><i class="fa fa-shopping-bag badge" id="shop-bag"></i></i></a></div>
                <div class="like sign-up"><a href="myaccount.php"><i class="fa fa-user-circle-o" id="user"></i></a></div>
            </div>
        </div>
    </div>
    <div class="container">
    