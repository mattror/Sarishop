<!-- Add to Bag-->
<div id="buy" class="quick-view">
    <div class="quick-content animate">
        <span onclick="document.getElementById('buy').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="quick-img">
            <p><img id="myimage" src="admin/<?php  ?>" width="300" height="240"></p>
        </div>
        <div class="quick-detail">
            <div class="quick-product-name"><h3>Winter Dress for female</h3></div>
            <div class="quick-product-price"><h3>25$</h3></div>
            <div class="quick-product-size">
                <h6>SIZE</h6>
                <ul>
                    <li><a href="#">XS</a></li>
                    <li><a href="#">S</a></li>
                    <li><a href="#">M</a></li>
                    <li><a href="#">L</a></li>
                    <li><a href="#">XL</a></li>
                    <li><a href="#">XXL</a></li>
                </ul>
            </div>
            <div class="product-available">
                <div class="product-available-name"><h6>AVAILABILITY: </h6></div>
                <div class="product-available-stock"><h6 style="color: #aaa;">please select size</h6></div>
            </div>
            <div class="product-add-to-bag">
                <h6>QUANTITY</h6>   
                <div class="input-qty">
                    <input type="button" value="-" id="qty-minus" class="qty-btn qty-btn-minus" onclick="dec()">
                    <input type="number" name="quantity[]" id="quantity" class="qty-box" min="1">
                    <input type="button" value="+" id="qty-plus" class="qty-btn qty-btn-plus" onclick="inc()">
            
                    <script> 
                        var qty = 1;
                        document.getElementById("quantity").value = qty;
                        function inc() {
                            qty++;
                            document.getElementById("quantity").value = qty;
                        }
                        function dec() {
                            qty--;
                            if(qty<=0) qty = 1;
                            document.getElementById("quantity").value = qty;
                        }
                    </script>
                </div>
                
                <div class="add-to-bag">
                    <div class="save-bag"><a href="admin/admin.php" id="add-bag">ADD TO BAG</a></div>
                    <div class="save-like"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>