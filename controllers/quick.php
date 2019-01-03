<?php 
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
View::header();

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM upload_product WHERE id = $id";
    $result = Database::query($sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            
            $sizeString = $row["size"];
            $sizeArray = explode(",",$sizeString); 
            if(($key = array_search("",$sizeArray)) != false){
                unset($sizeArray[$key]);
            }
?>
<form action="bag.php?action=add&id=<?php echo $row["id"];?>" method="post">
<div id="buy" class="quick-view">
    <div class="quick-content animate">
        <div class="quick-img">
            <p><img id="myimage" src="admin/<?php echo $row["image"]; ?>" width="300" height="240"></p>
            <a href="admin/<?php echo $row["image"]; ?>">View Full Image</a>
        </div>
        <div class="quick-detail">
            <div class="quick-product-name"><h3><?php echo $row["name"]; ?></h3></div>
            <div class="quick-product-price"><h3 style="color:#f72d63;">$<?php echo $row["price"]; ?></h3></div>
            <div class="quick-product-size">
                <h6>SIZE: <span style="color:#EB379A99;"><i>please select size below</i></span></h6>
                    <?php foreach($sizeArray as $size){
                    ?>
                    <label class="size-label"><?php echo strtoupper($size); ?>
                        <input type="radio" id="myCheck" name="size" value="<?php echo ($size); ?>" required>
                    </label>
                    <?php 
                    }
                    ?>
                    <script> document.getElementById("myCheck").required; </script>
            </div>
            <div class="product-available">
                <div class="product-available-name"><h6>IN STOCK: </h6></div>
                <div class="product-available-stock"><h6><?php echo $row["instock"]; ?></h6></div>
            </div>
            <div class="product-add-to-bag">
                <h6>QUANTITY</h6>   
                <div class="input-qty">
                    <input type="button" value="-" id="qty-minus" class="qty-btn qty-btn-minus" onclick="dec()">
                    <input type="number" name="quantity" id="quantity" class="qty-box" min="1" maxlength="<?php echo $row["instock"];?>">
                    <input type="button" value="+" id="qty-plus" class="qty-btn qty-btn-plus" onclick="inc()">
            
                    <script> 
                        var qty = 1;
                        var totalQty = <?php echo $row["instock"];?>;
                        document.getElementById("quantity").value = qty;
                        function inc() {
                            qty++;
                            if(qty > totalQty) qty = totalQty;
                            document.getElementById("quantity").value = qty;
                        }
                        function dec() {
                            qty--;
                            if(qty<=0) qty = 1;
                            document.getElementById("quantity").value = qty;
                        }
                    </script>
                </div>
                <div class="add-to-bag">
                    <div class="save-bag">
                        <label for="addbag">Add to Bag</label>
                        <input type="submit" id="addbag" value="Add to Bag">
                    </div>
                    <div class="like heart"><a href="add_whishlist.php?id=<?php echo $row["id"];?>"><i class="fa fa-heart-o"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class='pagination'>
    <a href="index.php"><i class="arrow left"></i> Back</a>
</div>

<?php
$tag = explode(",",$row["tag"]);
    }
    ?>

<div class="suggest-tag">
    <h5>Suggest tag:</h5>
    <ul>
        <?php 
            
            $tagStr = "";
            foreach($tag as $value){
                $tagStr .=  $value."|"; 
            }
            $tagStr = substr($tagStr,0,-1);
            $sql = "SELECT * FROM upload_product WHERE tag REGEXP '$tagStr' ";
            $result = Database::query($sql);
            $row = mysqli_fetch_assoc($result);
        ?>
    </ul>
</div>

    <?php
    }
View::footer();
}else{
    die("error");
}