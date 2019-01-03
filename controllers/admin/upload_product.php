<?php
    require_once("server.php");
    upload();
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
                <h1>Upload Product</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <!--choose image-->
                    <div class="choose-image">
                        <label for="input-file">Choose Image</label>
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
                    <!-- info -->
                    <div class="info">
                        <label for="name">Product's Name</label>
                        <input type="text" name="item_name" class="input_detail" placeholder="Item Name" id="name"required>
                        <!--gender -->
                        <select name="gender" class="input-detail" id="gender" required>
                            <option value="gender" disabled selected>Gender</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="kid">Kid</option>
                        </select>
                        <!--category -->
                        <label for="cate">Category</label>
                        <select name="category" class="input-detail" id="cate" required>
                            <option value="category" disabled selected>Category</option>
                            <option value="cloth">Cloth</option>
                            <option value="shoes">Shoes</option>
                            <option value="purse">Purse</option>
                            <option value="backpack">Backpack</option>
                        </select>
                        <!-- size -->
                        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
                        <script>
                            function check_uncheck_checkbox(isChecked) {
                                if(isChecked) {
                                    $('input[name="size[]"]').each(function() { 
                                        this.checked = true; 
                                        
                                    });
                                } else {
                                    $('input[name="size[]"]').each(function() {
                                        this.checked = false;
                                    });
                                }
                                
                            }
                        </script>

                        <div id="frmCheckAll">
                            <div id="divCheckAll">
                            <input type="checkbox" name="checkall" id="checkall" onClick="check_uncheck_checkbox(this.checked);" />All Size</div>
                            <div id="divCheckboxList">
                                <div class="divCheckboxItem"><input type="checkbox" name="size[]" id="s" value="s" />S (Small)</div>
                                <div class="divCheckboxItem"><input type="checkbox" name="size[]" id="m" value="m" />M (Medium)</div>
                                <div class="divCheckboxItem"><input type="checkbox" name="size[]" id="l" value="l" />L (Large)</div>
                            </div>
                            <textarea id="all" style="display:none"></textarea>
                        </div>

                        <label for="stock">In Stock</label>
                        <input type="number" name="instock" id="stock" class="input_detail" placeholder="In Stock" required>
                        <label for="pr">Price</label>
                        <input type="number" name="price" id="pr" class="input_detail" placeholder="Price" step="any" required>
                        <label for="tag">Tag</label>
                        <textarea class="descript" id="tag" name="item-tag" cols="25" rows="2" placeholder="Tag" required></textarea>
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