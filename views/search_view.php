<div class="search-bar">
<form action="index.php" method="get">
    <select class="categ submit" name="category">
        <option value="all" selected>All</option>
        <option value="cloth">Cloth</option>
        <option value="shoes">Shoes</option>
        <option value="purse">Purse &amp; Backpack</option>
    </select>
    <input type="text" placeholder="Search" class="search" required name="keyword" value="<?=isset($_GET["keyword"])?$_GET["keyword"]:"";?>"
    onkeyup="showResult(this.value)" >
    <button type="submit" class="submit" name="search"><i class="fa fa-search"></i></button>
</form>
</div>