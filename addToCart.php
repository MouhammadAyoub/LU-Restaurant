<?php 
session_start();
if(isset($_GET["item_id"])){
    if(isset($_SESSION["orders"])){
        $orders = $_SESSION["orders"];
        $id =$_GET["item_id"];
        if(!in_array($id,$orders)){
        $orders[]=$id;
        $_SESSION["orders"]= $orders;
    }
}
else{
    $id =$_GET["item_id"];
   $orders[] = $id;
   $_SESSION["orders"] = $orders;
}
}
if(isset($_GET["offer_id"])){
if(isset($_SESSION["offers"])){
    $offers = $_SESSION["offers"];
    $id =$_GET["offer_id"];
    if(!in_array($id,$offers)){
    $offers[]=$id;
    $_SESSION["offers"]= $offers;
    }
}
else{
    $id =$_GET["offer_id"];
   $offers[] = $id;
   $_SESSION["offers"] = $offers;
}
}
header("Location:".$_SERVER["HTTP_REFERER"]);




?>