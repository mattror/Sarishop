<?php
require_once "../libraries/view.class.php";
require_once "../models/user.class.php";
require_once "../libraries/database.class.php";

function pageCount() {
    $result = Database::query("SELECT COUNT(*) AS num FROM upload_product");
    $total_record = mysqli_fetch_assoc($result)["num"];
    return $total_record;
}

function offSet($per_page,$page){
    if($per_page <= 0) $per_page = 1;
    $offset = ($page-1) * $per_page;
    if($offset < 0) $offset = 0;
    return $offset;
}

function perPage($count, $per_page,$href){
    $output = "";
    if(!isset($_GET["page"])) $_GET["page"] = 1;
    $pages  = ceil($count / $per_page);
    if($pages > 1){
        if(($_GET["page"]-3)>0){
            if($_GET["page"] == 1){
                $output .='<span id=1 class="current-page">1</span>';
            }
            else{
                $output .='<input type="submit" name="page" class="perpage-link" value="1" />';
            }
        }

        if(($_GET["page"]-3)>1) {
            $output .='...';
        }
            
        for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
            if($i < 1) continue;
            if($i > $pages) break;
            if($_GET["page"] == $i)
                $output .='<span id='.$i.' class="current-page" >'.$i.'</span>';
            else				
                $output .='<input type="submit" name="page" class="perpage-link" value="' . $i . '" />';
        }
            
        if(($pages-($_GET["page"]+2))>1) {
            $output = $output . '...';
        }
        if(($pages-($_GET["page"]+2))>0) {
            if($_GET["page"] == $pages){
                $output .='<span id=' . ($pages) .' class="current-page">' . ($pages) .'</span>';
            }
            else{
                $output .='<input type="submit" name="page" class="perpage-link" value="' . $pages . '" />';
            }
        }
    }
    return $output;
}

function showPerPage($sql,$per_page,$href){
    $result  = Database::query($sql);
    $count   = mysqli_num_rows($result);
    $perpage = perPage($count, $per_page,$href);
    return $perpage;
}