<div class="slide-container">
    <?php 
        if(isset($slide) == false || count($slide) == 0){
            echo "<h1>No Image</h1>";
        }
        for($i=0; $i<count($slide); $i++){
        ?>
            <img class="mySlides w3-animate-right imgSlide" src="admin/<?php echo $slide[$i]->image; ?>"/>
        <?php
        }
    ?>
    <button class="slide-button slide-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="slide-button slide-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) { myIndex = 1 }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 5 seconds
    }
</script>