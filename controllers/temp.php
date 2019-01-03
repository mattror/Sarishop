if(isset($_POST)){
        if($_GET['itemID'] && $_GET['itemQty'] && $_GET['itemSize'] && $_GET['itemPrice']){
            $itemID = "";
            $itemQty = "";
            $itemSize = "";
            $itemPrice = "";
            if(count($_GET['itemID'])==1 && count($_GET['itemQty'])==1 && count($_GET['itemSize'])==1 && count($_GET['itemPrice'])==1){
            $itemID = $_GET['itemID'][0]; 
            $itemQty = $_GET['itemQty'][0];
            $itemSize = $_GET['itemSize'][0];
            $itemPrice = $_GET['itemPrice'][0];
            } else{
                foreach($_GET['itemID'] as $k =>$v){
                    $itemID .= $_GET['itemID'][$k].",";
                    $itemQty .= $_GET['itemQty'][$k].",";
                    $itemSize .= $_GET['itemSize'][$k].",";
                    $itemPrice .= $_GET['itemPrice'][$k].",";
                }
            }
            
            ?><script>alert("Successfully bought"); window.location = "index.php";</script><?php
            //echo '<pre>',var_dump($itemID),'</pre>';
            unset($_SESSION['cart']);
        }
    }