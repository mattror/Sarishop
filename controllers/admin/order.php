<?php
require_once "../database/config.php";
require_once "../admin/adheader.php";
?>
<script>
    var x = document.getElementById("order").style;
    var y = document.getElementById("category").style;
    x.background = '#000'; x.color = '#fff';
    y.background = '#000'; y.color = '#fff';
</script>


<?php
    if(isset($_GET['add']) && isset($_GET['id']) && isset($_GET['user']) && isset($_GET['qty'])){
        $conID = $_GET['id'];
        // take out 1 item from stock
        $st = "SELECT * FROM upload_product WHERE id = $conID ";
        $re = query($st);
        $ro = mysqli_fetch_assoc($re);

        $stock = $ro['instock'] - 1; 
        $sql = "UPDATE upload_product SET instock = $stock WHERE id = $conID "; 
        $result = query($sql);

        // insert to payment
        $paymentAmount = $_GET['qty'] * $ro['price'];
        $paymentID = time().mt_rand(0,100);
        $customerID = $_GET['user'];
        $paymentDate = date("d/m/Y").date(" h:i");
        $sql = "INSERT INTO payments(paymentID,customerID,paymentAmount,paymentDate) VALUES($paymentID,$customerID,$paymentAmount,'$paymentDate') ";
        $result = query($sql);

        // insert to order details
        $sql = "UPDATE orderdetails SET status = 'approve' WHERE productID = $conID ";
        $result = query($sql);
        ?><script>//window.location="order.php";</script><?php
    }
    if(isset($_GET['remove']) && isset($_GET['id'])){
        $reID = $_GET['id'];
        $sql = "UPDATE orderdetails SET status = 'drop' WHERE productID = $reID ";
        $result = query($sql);
    }
?>

<div class="cart">
    <?php
    $sql = "SELECT * FROM orderdetails WHERE status = 'requesting' ";
    $result = query($sql);
    if(mysqli_num_rows($result) != 0){
        $i=1;
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <table>
            <tbody>
                <tr>
                    <td style="width: 10%;"><strong>CUSTOMER #<?php echo $i++;?> </strong></td>
                </tr>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                // order id
                $id = $row['orderID'];
                $st = "SELECT * FROM orders WHERE orderID= $id GROUP BY customerID";
                $re = query($st);
                $r = mysqli_fetch_assoc($re);

                // customer id
                $customerID = $r['customerID'];
                $sta = "SELECT * FROM customer WHERE id= $customerID ";
                $res = query($sta);
                $ro = mysqli_fetch_assoc($res);
                ?>
                <tr>
                    <td><?php echo $ro['username'];?></td>
                    <td><?php echo $ro['phone'];?></td>
                    <td><?php echo $ro['address'];?></td>
                    <td colspan="2" style="text-align:center;">
                        <a href="order.php?add&id=<?php echo $row['productID'];?>&user=<?php echo $customerID;?>&qty=<?php echo $row['quantity'];?>" title="Approve" alt="edit"><i class="fa fa-edit"></i></a>
                        <a href="order.php?remove&id=<?php echo $row['productID'];?>" title="Drop / Remove" alt="edit"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <tr>
                    <th><strong>I</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Product</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Price</strong></th>
                </tr>
                <?php
                    $productID = $row['productID'];
                    $state = "SELECT * FROM upload_product WHERE id=$productID ";
                    $result1 = query($state);
                    $in = 1;
                    while($row1 = mysqli_fetch_assoc($result1)){
                    ?>
                        <tr>
                            <td><?php echo $in++;?> </td>
                            <td><img src="<?php echo $row1['image'];?>" alt="<?php echo $row1['name'];?>" style="width:3em;"></td>
                            <td><?php echo $row1['name'];?></td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['price'];?></td>
                        </tr>
                    <?php
                    }

                ?>
                <tr>
                    <td colspan="1"><strong>Payment Method</strong></td>
                    <td colspan="4"><strong>Cash on Delivery</strong></td>
                </tr>
                <tr>
                    <td colspan="1"><strong>Total</strong></td>
                    <td colspan="4"><strong>$<?php echo $row['price']*$row['quantity'];?></strong></td>
                </tr>
            </tbody>
        </table>
    <?php
        }
    }else{
        ?><div class="empty-bag"><h1>No New Order</h1></div><?php
    }
    ?>
</div>

<?php
require_once "../admin/adfooter.php"; 