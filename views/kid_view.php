<?php
require_once "../controllers/tag.php";
    if(isset($kid) == false || count($kid) == 0){
?>
    <div class="fashion female-fashion" style="display:none;"></div>
    <?php 
    }else{
    ?>
        <!--male Fashion-->
        <div class="fashion female-fashion"id="kid_cloth">
            <div class="fashion-title"><h2>Kid Fashion</h2></div>
            <!--banner tag-->
            <?php 
                $sql = "SELECT * FROM upload_product WHERE gender='kid' ORDER BY tag";
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
                for($i=0; $i<count($kid); $i++){
            ?>
            <form action="">
            <!--Item product-->
                <div class="item-product">
                    <div class="save-like"><a href="add_whishlist.php?id=<?php echo $kid[$i]->id;?>"><i class="fa fa-heart-o"></i></a></div>
                    <div class="product-thumb"><a><img src="admin/<?php echo $kid[$i]->image;?>" alt="product"></a></div>
                    <div class="product-info">
                        <div class="product-title"><h3><?php echo $kid[$i]->name;?></h3></div>
                        <div class="product-price">
                            <ins>$<?php echo $kid[$i]->price;?></ins>
                        </div>
                    </div>
                    <div class="fashion-extra extra-div">
                        <a href="quick.php?id=<?php echo $kid[$i]->id;?>">Quick Buy</a>
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
                <a href="kid.php?page=1">More</a>
            </div>
        </div>
    <?php
    }