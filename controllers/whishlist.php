<?php
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
View::header();
?>
<script>
    var x = document.getElementById("wishlist").style;
    x.color = 'red';
</script>
<?php
if(!isset($_COOKIE['log'])){
    ?><script>alert("Please Register!"); window.location = "register.php";</script><?php
}else{
    // remove a wishlist
    if(isset($_GET['remove'])){
        $removeID = $_GET['remove'];
        $sql = "UPDATE wishlist SET wishStatus = 'hidden' WHERE productID = $removeID ";
        $result = Database::query($sql);
        if(!$result){
        ?>
            <div class="empty-bag">
                <h1>Unable to delete!</h1>
                <div class="continue"><a href='index.php'>Contionue Shopping</a></div>
            </div> 
        <?php
        }
    }
    // check if login exist
    if(isset($_COOKIE['log'])){
        $phone = $_COOKIE['log'];
        $phone = intval($phone);
    }
    $sql = "SELECT * FROM customer WHERE phone = $phone ";
    $result = Database::query($sql);
    $row = mysqli_fetch_assoc($result);
    $customerID = $row['id'];

    $sql = "SELECT * FROM wishlist WHERE customerID = $customerID AND wishStatus = 'visible' ";
    $result = Database::query($sql);
    if(mysqli_num_rows($result) > 0){
        ?>
        <h1 style="text-align: center;">Your Wishlist</h1>
        <div class="cart">
            <table>
            <tbody>
                <tr>
                    <th><strong>No</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
        <?php
        $productID = "";
        while($row = mysqli_fetch_assoc($result)){
            $productID .= $row['productID'].",";
        }
        $productID = substr($productID,0,-1);
        
        $ex = explode(',',$productID);
        ?><form action="whistlist.php"><?php
        for($i=0; $i<count($ex); $i++){
            $productID = $ex[$i];
            $sql = "SELECT * FROM upload_product WHERE id = $productID ";
            $result = Database::query($sql);
            $row = mysqli_fetch_assoc($result);
        ?>
            <tr>
                <td><?php echo ($i+1);?></td>
                <td style="width: 30%;">
                    <a href="quick.php?id=<?php echo $row['id'];?>">
                        <img src="admin/<?php echo $row["image"];?>" alt="<?php echo $row["name"];?>" title="<?php echo $row["name"];?>" style="width: 3em;">
                    </a>
                </td>
                <td style="width: 30%; text-align:left;"><?php echo $row["name"];?></td>
                <td style="width: 30%;">
                    <a href="whishlist.php?remove=<?php echo $row["id"];?>" title="Remove" alt="wishlist"><i class="fa fa-trash-o"></i></a>
                    <a href="quick.php?id=<?php echo $row['id'];?>" title="Add to bag" alt="cart"><i class="fa fa-shopping-bag"></i></a>
                </td>
            </tr>
        <?php
        } 
        ?>
            </form>
            </tbody>
            </table>
            </div>
            <div class="continue"><a href='index.php'>Contionue Shopping</a></div>
        <?php 
    }else{
    ?>
        <div class="empty-bag">
            <h1>No Wishlist! </h1>
            <br/><br/>
            <div class="continue"><a href='index.php'>Contionue Shopping</a></div>
        </div> 
    <?php
    }
}
View::footer();