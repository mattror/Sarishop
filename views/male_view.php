<?php
require_once "../controllers/tag.php";
    if(isset($male) == false || count($male) == 0){
?>
    <div class="fashion female-fashion" style="display:none;"></div>
    <?php 
    }else{
    ?>
        <!--male Fashion-->
        <div class="fashion female-fashion" id="male_cloth">
            <div class="fashion-title"><h2>Male Fashion</h2></div>
            <!--banner tag-->
            <?php 
                $sql = "SELECT tag FROM upload_product WHERE gender='male' ORDER BY date";
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
                for($i=0; $i<count($male); $i++){
            ?>
            <form action="">
            <!--Item product-->
                <div class="item-product">
                    <div class="save-like"><a href="add_whishlist.php?id=<?php echo $male[$i]->id;?>"><i class="fa fa-heart-o"></i></a></div>
                    <div class="product-thumb"><a><img src="admin/<?php echo $male[$i]->image;?>" alt="product"></a></div>
                    <div class="product-info">
                        <div class="product-title"><h3><?php echo $male[$i]->name;?></h3></div>
                        <div class="product-price">
                            <ins>$<?php echo $male[$i]->price;?></ins>
                        </div>
                    </div>
                    <div class="fashion-extra extra-div">
                        <a href="quick.php?id=<?php echo $male[$i]->id;?>">Quick Buy</a>
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
                <a href="male.php?page=1">More</a>
            </div>
        </div>
    <?php
    }