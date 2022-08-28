<?php session_start();
if(!isset($_POST["submit"])){
  header("Location:./order-list.php");
}

?>

<style>
.form-control{
    margin-top: 30px;
    margin-bottom: 30px;
}

</style>



<link rel="stylesheet" href="css/order-list.css">

<body class="sub_page">

<?php 
include("./components/general/header2.php");
include("./components/general/head.php");
require("./functions.php");

if(isset($_POST["submit"])){
  //add customer to db
  $first = $_POST["firstName"];
  $last = $_POST["lastName"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
if(empty($first)||empty($last)|| empty($phone)||empty($address)){
  echo"Please fill all fields    <a href=\"./order-list.php\"> Back to order list page</a>";
  $enabled=0;
}
else{
  $enabled=1;
  $customer = array($phone,$first,$last,$address);
  $_SESSION["customer"]= $customer;
  
  if(!check_if_exist($phone)){
    addCustomer($first,$last,$phone,$address);
   
  }
  
}


?>

<center>
<div class="order-process">
<h2>Your Order</h2>
<?php if($enabled==1){?>
  
  <br/>
<pre>Name : <?php echo $first." ".$last;?></pre>
<pre>Phone : <?php echo $phone;?></pre>
<pre>Address : <?php echo $address;?></pre>
<?php }?>

<table>
<tr> <th></th><th>Item Name</th> <th>Quantity</th> <th>Price</th>       </tr>   
<?php 

//get ids from session

$orders=array();
if(isset ($_SESSION["orders"])){
$orders=$_SESSION["orders"]; }
//get list form post 
$offers = array();
$quantity= $_POST["quantity"];
$price = $_POST["price"];
$name = $_POST["name"];
// initialize quantity to 1 if empty
for($i=0;$i<count($quantity);$i++){
  if(empty($quantity[$i])){
    $quantity[$i]=1;
  }
}
$_SESSION["name"]=$name;
$_SESSION["quantity"]=$quantity;
$_SESSION["price"]=$price;
?>
<?php
if(isset($_SESSION["offers"])){
  $offers=$_SESSION["offers"];}
for($i=0;$i<count($offers);$i++){
  $offer =  getOffer($offers[$i]);
?>

<tr> 
 <td><img src="<?php echo"./images/".$offer[0][2];?>" alt="" width="100px"></td>   
<td><?php echo $name[$i]?></td>
<td><?php echo $quantity[$i]?></td>
<td><?php echo $price[$i]*$quantity[$i]?></td>
</tr>
<tr>
 <?php 
 }

?>

<?php for($i=count($offers);$i<count($quantity);$i++){
  $image= getImage($orders[$i-count($offers)]);


?>

<tr> 
 <td><img src="<?php echo "./images/".$image[0][0];?>" alt="" width="100px"></td>   
<td><?php echo $name[$i]?></td>
<td><?php echo $quantity[$i]?></td>
<td><?php echo $price[$i]*$quantity[$i]?></td>
</tr>
<tr>
 <?php 
 }
}
?>
<tr><td colspan="3">Total price:</td><td>
<!--Calculate Total -->
<?php
  $total=0;
  for($i=0;$i<count($quantity);$i++){
    $total = $total + ($price[$i]*$quantity[$i]);
  }
  echo $total." LL";
?>

</td></tr>
</table>
<br/>
<br/>
<form action="./order-proceed.php"  method="post">
<input type="submit" value="Cancel" name="cancel" style=" display: inline-block;
                                            padding: 8px 30px;background-color: #ffbe33;
                                            color: #ffffff;
                                            border-radius: 45px;
                                            border: none;
                                            margin-left:40px;
                                            margin-right:40px;" >

<input  type="submit" value="Confirm" name="confirm" style="  display: inline-block;
                                              padding: 8px 30px;background-color: #ffbe33;
                                              color: #ffffff;
                                              border-radius: 45px;
                                              border: none;
                                              margin-left:40px;
                                              margin-right:40px;"
                                              <?php echo $enabled==0?"disabled":""?>>
</form>
</div>

</center>
<br/>
<?php include("./components/general/footer.php"); ?>
</body>

<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  