<?php
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";
View::header();

?>
<div class='fashion'>
<h5> 
    <ul>
        <li>We will contact you within <span style="color: #F8403F;">30 mn</span> </li>
        <li>If you did not receive call from us, it might be you enter invalid phone number.</li>
        <li>For more information, please feel free to call us via cellular phone <span style="color: #F8403F;">085524103 / 0715803308</span> or 
        email us via <span style="color: #F8403F;">matt.rorfiyah.dev@gmail.com</span></li>
    </ul>
    <h2 style="color: #0C5EFF; text-align: center;">Thanks for shopping with us!</h2>
</h5>
<div class="continue"><a href='index.php'>Contionue Shopping</a></div>
</div>
<?php

View::footer();
