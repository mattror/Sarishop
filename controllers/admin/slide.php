<?php
    require_once("server.php");
    slide();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload</title>
        <link rel="stylesheet" href="../css/upload.css" type="text/css">
        <link rel="shortcut icon" href="../pictures/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>
        <div class="wrapper">
            <div class="container animate modal">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Upload Slide Images</h1>
                    <h5>Image must be at width 1200 pixels and height 450 pixels</h5>
                    <div class="choose-image">
                        <label for="input-file" required>Choose Image</label>
                        <input type="file" name="image" id="input-file" accept="image/*" onchange="loadFile(event)">
                        <div class="img-output">
                            <img id="output"/>
                        </div>
                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </div>

                    <div class="info">
                        <label for="name">Image's Name</label>
                        <input type="text" name="item_name" class="input_detail" placeholder="Item Name" id="name"required>
                        <label for="dest">Description</label>
                        <textarea class="descript" id="dest" name="description" cols="25" rows="3" placeholder="Description" required></textarea>
                        <input type="submit" name="submit" class="submit" value="Upload">
                    </div>

                </form>
                <div class="cancel">
                    <a href="admin.php" class="cancel-btn submit">Cancel</a>
                </div>
            </div>
        </div>
    </body>
</html>