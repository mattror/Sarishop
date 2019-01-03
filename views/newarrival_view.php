<?php 
    if(isset($arrival) == false || count($arrival) == 0){
    ?>
        <div class="new-arrival-title best-sellers-title" style="display:none;"></div>
    <?php
    }else{
    ?>
        <div class="new-arrival best-sellers" >
            <div class="new-arrival-title best-sellers-title"><h4>New Arrival</h4></div>
            <div class="new-arrival-product best-sellers-product">
            
                <?php for($i=0; $i<count($arrival); $i++){  ?>
                    <form  method="post" action="">
                    <div class="new-arrival-items best-sellers-items">
                        <div class="text-on-img"><h5>New Arrival</h5></div>
                        <div class="save-like"><a href="add_whishlist.php?id=<?php echo $arrival[$i]->id;?>"><i class="fa fa-heart-o"></i></a></div>
                        <div class="new-arrival-img best-sellers-items-img"><a><img src="admin/<?php echo $arrival[$i]->image;?>" alt="product"></a></div>
                        <div class="new-arrival-title best-sellers-items-title"><h6><?php echo $arrival[$i]->name;?></h6></div>
                        <div class="price">
                            <h6>$<?php echo $arrival[$i]->price;?></h6>
                        </div>
                        <div class="fashion-extra extra-div">
                            <a href="quick.php?id=<?php echo $arrival[$i]->id;?>">Quick Buy</a>
                        </div>
                    </div>
                    </form>
                <?php 
                }
                ?>
            </div>
            <div class="best-sellers-more"><a href="newarrival.php?page=1">More</a></div>
        </div>
    <?php
    }


