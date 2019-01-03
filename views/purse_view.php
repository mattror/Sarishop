<?php
require_once "../controllers/tag.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
require_once "../controllers/pagination.php";
    if(isset($purse) == false || count($purse) == 0){
?>
    <div class="fashion female-fashion" style="display:none;"></div>
    <?php 
    }else{
    ?>
        <!--purse Fashion-->
        <div class="fashion female-fashion" id="purse">
            <div class="fashion-title"><h2>Purse Fashion</h2></div>
            <!--banner tag-->
            <?php 
                $sql = "SELECT * FROM upload_product WHERE category='purse' ORDER BY tag";
                $result = tag($sql);
            ?>
            <div class="banner-tag">
                <div class="list-tag">
                    <ul>
                        <?php 
                            $key = explode(",",$result["tag_name"]);
                            foreach($key as $value){
                        ?>
                        <li><a href="tag.php?tag=<?php echo $value;?>"><?php echo $value;?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="fashion-thumbnail">
            <?php
                for($i=0; $i<count($purse); $i++){
            ?>
            <form action="">
            <!--Item product-->
                <div class="item-product">
                    <div class="save-like"><a href="add_whishlist.php?id=<?php echo $purse[$i]->id;?>"><i class="fa fa-heart-o"></i></a></div>
                    <div class="product-thumb"><a><img src="admin/<?php echo $purse[$i]->image;?>" alt="product"></a></div>
                    <div class="product-info">
                        <div class="product-title"><h3><?php echo $purse[$i]->name;?></h3></div>
                        <div class="product-price">
                            <ins>$<?php echo $purse[$i]->price;?></ins>
                        </div>
                    </div>
                    <div class="fashion-extra extra-div">
                        <a href="quick.php?id=<?php echo $purse[$i]->id;?>">Quick Buy</a>
                        <!-- -->
                    </div>
                </div>
            <?php
                }
            ?>
            </form>
            </div>
            <!--fashion more-->
            <div class="fashion-more">
                <a href="purse.php?page=1">More</a>
            </div>
        </div>
    <?php
    }