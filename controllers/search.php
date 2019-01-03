<?php
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
require_once "../controllers/pagination.php";
View::header();

if(isset($_GET["q"])){
  $cate = $_GET["c"];
  $word = $_GET["q"];
  $href = $word;

  $total_record = pageCount();
  $page = (isset($_GET['page']))?$_GET['page']:1;
  $per_page = 10;
  $offset = offSet($per_page,$page);

  if($cate == "all"){
    $sql = "SELECT * FROM upload_product WHERE name LIKE '%$word%' ORDER BY id DESC";
  }else{
    $sql = "SELECT * FROM upload_product WHERE name LIKE '%$word%' AND category = '$cate' ORDER BY id DESC";
  }
  $result = Database::query("$sql LIMIT $offset, $per_page");

  if(!empty($result)){
    $p["perpage"] = showPerPage($sql,$per_page,$href);
  }

  echo "<h3>Result for: ".$word ."</h3>"; ?>
  <div class="fashion">

  <?php if(mysqli_num_rows($result) > 0){ ?> 
  <?php while($row = mysqli_fetch_assoc($result)){ ?>
  <form action="search.php" method="get"> 
    <div class="item-product" id="<?php echo $row["id"];?>">
      <div class="save-like"><a href="add_whishlist.php?id=<?php echo $row["id"];?>"><i class="fa fa-heart-o"></i></a></div>
        <div class="product-thumb"><a><img src="admin/<?php echo $row["image"];?>" alt="product"></a></div>
        <div class="product-info">
            <div class="product-title"><h3><?php echo $row["name"];?></h3></div>
            <div class="product-price">
                <ins>$<?php echo $row["price"];?></ins>
            </div>
        </div>
        <div class="fashion-extra extra-div">
            <a href="quick.php?id=<?php echo $row["id"];?>">Quick Buy</a>
        </div>
    </div>

  <?php }?>
  <input type="text" name="c" value="<?php echo $cate; ?>" style="display:none;">
  <input type="text" name="q" value="<?php echo $href; ?>" style="display:none;">
  </div>
  <div class='pagination'>
  <?php if(isset($p["perpage"])){
      echo $p["perpage"]; 
    }
  ?>
  <div class="continue"><a href="index.php"><i class="arrow left"></i> Back</a></div>
  </div>
    </form>
  <?php 
    }else{
      ?>
        <h1>Not Found !</h1>
      <div class="pagination">
        <a href="index.php"><i class="arrow left"></i> Back</a>  </div>
      <?php
    }
}
View::footer();