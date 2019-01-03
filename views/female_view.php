<?php
require_once "../controllers/tag.php";
    if(isset($female) == false || count($female) == 0){
?>
    <div class="fashion female-fashion" style="display:none;"></div>
    <?php 
    }else{
    ?>
        <!--Female Fashion-->
        <div class="fashion female-fashion" id="female_cloth">
            <div class="fashion-title"><h2>Female Fashion</h2></div>
            <!--banner tag-->
            <?php 
                $sql = "SELECT * FROM upload_product WHERE gender='female' ORDER BY tag";
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
                for($i=0; $i<count($female); $i++){
            ?>
            <form action="">
            <!--Item product-->
                <div class="item-product">
                    <div class="save-like"><a href="add_whishlist.php?id=<?php echo $female[$i]->id;?>"><i class="fa fa-heart-o"></i></a></div>
                    <div class="product-thumb"><a><img src="admin/<?php echo $female[$i]->image;?>" alt="product"></a></div>
                    <div class="product-info">
                        <div class="product-title"><h3><?php echo $female[$i]->name;?></h3></div>
                        <div class="product-price">
                            <ins>$<?php echo $female[$i]->price;?></ins>
                        </div>
                    </div>
                    <div class="fashion-extra extra-div">
                        <a href="quick.php?id=<?php echo $female[$i]->id;?>">Quick Buy</a>
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
                <a href="female.php?page=1">More</a>
            </div>
        </div>
    <?php
    }