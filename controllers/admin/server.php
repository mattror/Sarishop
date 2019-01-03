<?php
    require_once "../database/config.php";
    session_start();

    // ****************************************************** LOGIN
    $isValid = true;
    function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = $_POST["username"];
            $pass = $_POST["password"];
            $result = query("SELECT * FROM admin_login WHERE adminName = $user AND Password = $pass");
            if(!$result){
                $isValid = false;
                var_dump($result);
            } 
            else{
                header("location: admin.php");
            }
        }else{
            die("error");
        }
    }

    // ****************************************************** UPLOAD PRODUCT
    function upload(){
        $uploadOk = true;
        if(isset($_POST['submit'])){
            $id = time().mt_rand(1,100);
            $date = time().date("dmY");
            $descript = $_POST["description"];
            $descript = str_replace('\'',"",$descript);
            $item_name = $_POST["item_name"];
            $item_name = str_replace('\'', '', $item_name);
            $price = $_POST["price"];
            $category = $_POST["category"];
            $gender = $_POST["gender"];
            $stock = $_POST["instock"];
            $tag = $_POST["item-tag"];
            $si = $_POST["size"];
            $size = "";
            if(count($si)==1){
                $size = $si;
            }else{
                foreach ($si as $s){
                    $size .= $s.","; 
                }
            }

            $directory = "uploaded_image/";
            $info = pathinfo($_FILES['image']['name']); // information about file path
            $new_file_name = time() ."_". rand(10000,99999) .".". $info['extension'];
            $imgType = $info['extension'];
            $path = $directory . $new_file_name;

            // Check file size
            if ($_FILES['image']["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = false;
            }
            // Allow certain file formats
            if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif"){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = false;
            }

            if($uploadOk == false){
                die ("Sorry, your product was not uploaded!");
            }else{
                $move = move_uploaded_file($_FILES['image']['tmp_name'],$path);
                $sql = "INSERT INTO upload_product(id,name,gender,category,size,instock,price,description,image,tag,date) 
                VALUES('$id','$item_name','$gender','$category','$size','$stock','$price','$descript','$path','$tag','$date')";
                $result = query($sql);
                if(!$result){ die("Internal Error"); }
                if(!$move){
                    echo "There was an error in uploading file!";
                }else{
                    ?>
                    <script>
                        alert("Successfully Uploaded!");
                        window.location="admin.php";
                    </script>
                    <?php
                }
            }
        }
    }

    //******************************************************* SLIDE 
    function slide(){
        $uploadOk = true;
        if(isset($_POST['submit'])){

            $descript = $_POST["description"];
            $item_name = $_POST["item_name"];
            $directory = "uploaded_slide/";
            $info = pathinfo($_FILES['image']['name']); // information about file path
            $new_file_name = time() ."_". rand(10000,99999) .".". $info['extension'];
            $imgType = $info['extension'];
            $path = $directory . $new_file_name;

            // Check file size
            if ($_FILES['image']["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = false;
            }
            // Allow certain file formats
            if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif"){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = false;
            }

            if($uploadOk == false){
                die ("Sorry, your product was not uploaded!");
            }else{
                $move = move_uploaded_file($_FILES['image']['tmp_name'],$path);
                $result = query("INSERT INTO slide_show(name,description,image) 
                VALUES('$item_name','$descript','$path')");

                if(!$result) die("Internal Error!");
                if(!$move){
                    echo "There was an error in uploading file!";
                }else{
                    ?>
                    <script>
                        alert("Successfully Uploaded!");
                        window.location="admin.php";
                    </script>
                    <?php
                }
            }
        }
    }

    //******************************************************* SLIDE SHOW
    