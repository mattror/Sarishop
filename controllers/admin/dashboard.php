<?php
require_once "../database/config.php";
require_once "../admin/adheader.php";
?>
<script>
    var x = document.getElementById("dashboard").style;
    x.background = '#000'; x.color = '#fff';
</script>
<?php

$sql = "SELECT * FROM orderdetails WHERE status = 'requesting' ";
$result = query($sql);
if(mysqli_num_rows($result) > 0){
    ?> <div class="noti">New Order Waiting ! <a href="order.php">Go to Order</a></div> <?php
}

$date = "01/".date("m/Y")." 00:00";
$sql = "SELECT COUNT(orderID) FROM orders WHERE orderDate >= '$date' ";
$result = query($sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result); 
?>
    <div class="list-tag">
        <ul>
            <li>
                <a href="#"><h2><strong><?php echo date("F")." Ordered<br/>".$row['COUNT(orderID)'];?></strong></h2></a>
            </li>
            <li>
            <!-- Monthly Revenue -->
            <?php
                $date = "01/".date("m/Y")." 00:00";
                $sql = "SELECT SUM(paymentAmount) FROM payments WHERE paymentDate >= '$date' ";
                $result = query($sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result); 
                    $revenue = $row['SUM(paymentAmount)']?$row['SUM(paymentAmount)']:0;
                    ?>
                <li>
                    <a href="#"><h2><strong><?php echo date("F")." Revenue<br/>"."$ ".$revenue;?></strong></h2></a>
                </li>
                <?php 
                }
            ?>
            </li>
            <?php 
            }
            ?>
        </ul>
        <ul>
            <?php 
            $date = date("d/m/Y")." 00:00";
            $sql = "SELECT COUNT(orderID) FROM orders WHERE orderDate >= '$date' ";
            $result = query($sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result); 
                $or = $row['COUNT(orderID)']?$row['COUNT(orderID)']:0;
                ?>
            <li>
                <a href="#"><h2><strong>Today Ordered <br/><?php echo $or;?></strong></h2></a>
            </li>
            <li>
            <?php
                $date = date("d/m/Y")." 00:00";
                $sql = "SELECT SUM(paymentAmount) FROM payments WHERE paymentDate >= '$date' ";
                $result = query($sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result); 
                    $revenue = $row['SUM(paymentAmount)']?$row['SUM(paymentAmount)']:0;
                ?>
                <li>
                    <a href="#"><h2><strong><?php echo "Today Revenue<br/>"."$ ".$revenue;?></strong></h2></a>
                </li>
                <?php 
                }
            ?>
            </li>
        </ul>
    </div>
<?php
}
require_once "../admin/adfooter.php"; 