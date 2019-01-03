
<?php 
    if(isset($arrival) == false || count($arrival) == 0){
    ?>
        <div class="best-sellers-title"><h4>Best Seller</h4></div>
        <div class="best-sellers-items" style="border: solid 1px #000;">
            <div class="best-sellers-items-img"><p style="text-align: center;">No Image</p></div>
            <div class="best-sellers-items-title"><h6>Unknown</h6></div>
            <div class="best-sellers-items-price">
                <div class="new-price price"><h6>N/A</h6></div>
            </div>
        </div>
    <?php
    }else{
    ?>
        <div class="new-arrival best-sellers">
            <div class="new-arrival-title best-sellers-title"><h4>New Arrival</h4></div>
            <div class="new-arrival-product best-sellers-product">
            <?php for($i=0; $i<count($arrival); $i++){ ?>
                <div class="new-arrival-items best-sellers-items">
                    <div class="text-on-img"><h5>New Arrival</h5></div>
                    <div class="new-arrival-img best-sellers-items-img"><a href=""><img src="admin/<?php echo $arrival[$i]->image;?>" alt="product"></a></div>
                    <div class="new-arrival-title best-sellers-items-title"><h6><?php echo $arrival[$i]->name;?></h6></div>
                    <div class="price">
                        <div class="old-price price"><h6><del>$20</del></h6></div>
                        <h6>$<?php echo $arrival[$i]->price;?></h6>
                    </div>
                    <div class="extra-div">
                        <a href="#" id="<?php echo $arrival[$i]->id;?>" title="Buy" onclick="addToBag()"><h4>Quick Buy</h4></i></a>
                    </div>
                </div>
            <?php 
            }
            ?>
            </div>
            <div class="best-sellers-more"><a href="">More</a></div>
            <div class="best-sellers-banner"><a href=""><img src="pictures/banner.jpg" alt="banner"></a></div>
        </div>

    <?php
    }
?>
