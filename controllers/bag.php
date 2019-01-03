<?php 
session_start();
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
View::header();
?>
<script>
    var x = document.getElementById("shop-bag").style;
    x.color = 'red';
</script>
<?php
if(isset($_GET["action"]) & !empty($_GET['id'])){
    $id = $_GET['id'];
    $action = $_GET["action"];
    switch ($action) {
        case "add":
            if(isset($_POST['quantity']) && isset($_POST['size'])){
                $item = $id. ":" .$_POST['quantity']. ":" .$_POST['size'];
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];
                    $cartItem = explode(",",$cart);
                    $cart .= ",".$item;
                    $_SESSION['cart'] = $cart;
                }else{
                    $_SESSION['cart'] = $item;
                }
                ?><script> alert("Added"); </script><?php
            }
            break;
        
        case "remove":
            if(!empty($_SESSION["cart"]) & !empty($id)) {
                $extract = explode(",",$_SESSION["cart"]);
                $new_ex = array();
                foreach($extract as $k => $v){
                    if($v == $id) continue;
                    else $new_ex[] = $v;
                }
                $_SESSION["cart"] = implode(",",$new_ex);
                if($_SESSION['cart']=="") unset($_SESSION['cart']);
            }
            break;
        case "empty":
            unset($_SESSION["cart"]);
            break;	
    }
}
if(isset($_SESSION["cart"])){
    $total_item = 0; 
    $item = $_SESSION["cart"];
    $cart_item = explode(",",$item); 
    $i=1;
?>
    <h1 style="text-align: center;">Your Bag</h1>
<div class="cart">
        <table>       
        <tr>
            <th><strong>No</strong></th>
            <th><strong>Image</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Price</strong></th>
            <th><strong>QTY</strong></th>
            <th><strong>Action</strong></th>
        </tr>
<?php
    foreach($cart_item as $k =>$v){ 
        $extract = explode(":",$v); 
        $rs = array();
        foreach($extract as $k => $v){
            $rs[] = array($v); 
            $data = array(
                "itemId" => @$rs[0],
                "itemQty" => @$rs[1],
                "itemSize" => @$rs[2]
            );
        }
        $id = $data['itemId'][0];
        $itemIndex = $data['itemId'][0].":".$data['itemQty'][0].":".$data['itemSize'][0];

        $sql = "SELECT * FROM upload_product WHERE id='$id' ";
        $result = Database::query($sql);
        $r = mysqli_fetch_assoc($result);
?>	<form action="checkout.php">
        <tr>
            <td style="width: 5%;"><?php echo $i; ?></td>
            <td style="width: 10%;"><img src="admin/<?php echo $r["image"]; ?>" alt="<?php echo $r["name"]; ?>" title="<?php echo $r["name"]; ?>" style="width: 3em;"></td>
            <td style="width: 20%;"><?php echo $r["name"]; ?></td>
            <td style="width: 20%;">$ <?php echo $r["price"]; ?></td>
            <td style="width: 10%;"><?php echo $data['itemQty'][0]; ?></td>
            <td style="width: 10%;"><a href="bag.php?action=remove&id=<?php echo  $itemIndex;?>"><i class="fa fa-trash-o"></i></a></td>
		</tr>
    <?php
        $total_item += ($r["price"] * $data['itemQty'][0]);
        $i++;
        ?> 
            <input type="hidden" name="itemID[]" value="<?php echo $data['itemId'][0];?>">
            <input type="hidden" name="itemQty[]" value="<?php echo $data['itemQty'][0];?>">
            <input type="hidden" name="itemSize[]" value="<?php echo $data['itemSize'][0];?>">
            <input type="hidden" name="itemPrice[]" value="<?php echo $r["price"];?>">
        <?php
    }
    ?>
        <tr><td colspan="6">Total: <strong style="color: #FF0606;"><?php echo "$".$total_item; ?></strong></td></tr>
        </table>
        <div class="continue"><a href='index.php'>Contionue Shopping</a></div>
        <div class="checkout"><input type="submit" value="Check Out"></div>
    </form>
    </div>
    <?php
}else{
?>
    <div class="empty-bag">
        <h1>Your bag is empty</h1>
        <div class="continue"><a href='index.php'>Contionue Shopping</a></div>
    </div>
<?php
}
View::footer();