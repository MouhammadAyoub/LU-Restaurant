<?php 
session_start();
if(isset($_GET["item_id"])){
    $i=$_GET["item_id"];
    $arr = $_SESSION["orders"];
array_splice($arr,$i,1);
 $_SESSION["orders"]=$arr;
}
if(isset($_GET["offer_id"])){
    $i=$_GET["offer_id"];
    $arr = $_SESSION["offers"];
array_splice($arr,$i,1);
$_SESSION["offers"]=$arr;
}
header("Location:./order-list.php");
?>