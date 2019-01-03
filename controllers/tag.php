<?php 
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
require_once "../controllers/pagination.php";

if(isset($_GET['tag'])){
    View::header();
    if(!isset($_GET['page'])){
        $paging = (isset($_GET['page']))?$_GET['page']:$paging = 1;
    }else
    $paging = (isset($_GET['page']))?$_GET['page']:$paging = 1;
    $href = $_GET["tag"];
    $per_page = 10;
    $offset = offSet($per_page,$paging);

    $tag = $_GET['tag'];
    $tag = str_replace('','', $tag);
    $sql = "SELECT * FROM upload_product WHERE name LIKE '%$tag%'";
    $result = Database::query($sql."LIMIT $offset, $per_page");
    if(mysqli_num_rows($result) == 0){
        $sql = "SELECT * FROM upload_product WHERE tag LIKE '%$tag%'";
    }
    $result = Database::query($sql."LIMIT $offset, $per_page");
    if(!empty($result)){
        $p["perpage"] = showPerPage($sql,$per_page,$href);
    }
    ?>
    <div class="new-arrival-title best-sellers-title"><h4>"<?php echo strtoupper($tag);?>"</h4></div>
    <div class="fashion">
    <?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <form action="" method="get"> 
            <div class="item-product" id="<?php echo $row["id"];?>">
                <div class="save-like"><a href="add_whishlist.php"><i class="fa fa-heart-o"></i></a></div>
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
  <input type="text" name="tag" value="<?php echo $href; ?>" style="display:none;">
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
        echo "<div class='not-found'><h1>Not Found !</h1>";
        echo "<a href='index.php'>Back</a></div>";
    }
    View::footer();
}


function tag($sql){
    $result = Database::query($sql);
    $return = "";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $return = $tag_array = array(
                "tag_name" => $row["tag"]
            );
        }
    }
    return $return;
}