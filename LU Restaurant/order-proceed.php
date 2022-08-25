<?php 
session_start();


  



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
if(isset($_POST["cancel"])){
  header("Location:./order-list");
  
}
include("./components/general/header2.php");
include("./components/general/head.php");
require("./functions.php");

if(isset($_POST["confirm"])){
    
    $orders=array();
    if(isset($_SESSION["orders"])){
      $orders =$_SESSION["orders"];
    } 
    $offers =array();
    if(isset($_SESSION["offers"])){
      $offers =$_SESSION["offers"];
    }
    $customer = $_SESSION["customer"];
    
    $quantity=$_SESSION["quantity"];
    $price=$_SESSION["price"];
    $name=$_SESSION["name"];
    $enabled= 1;
    // add orders to db and proceed it 
    for($i=0;$i<count($offers);$i++){
    add_order($customer[0],1,intval($offers[$i]),$quantity[$i],intval($price[$i]),$customer[3]);  
    }
    for($i=count($offers);$i<count($orders);$i++){
      add_order($customer[0],intval($orders[$i-count($offers)]),1,$quantity[$i],intval($price[$i]),$customer[3]);  
      }
      count_orders($customer[0]);

    // display message to proceed
    // increment number of orders for customer



?>

<center>
<div class="order-process">
<h2>Your Order</h2>
<?php if($enabled==1){?>
  
  <br/>
<pre>Name : <?php echo $customer[1]." ".$customer[2];?></pre>
<pre>Phone : <?php echo $customer[0];?></pre>
<pre>Address : <?php echo $customer[3];?></pre>
<?php }?>

<table>
<tr> <th></th><th>Item Name</th> <th>Quantity</th> <th>Price</th>       </tr>   
<?php 


for($i=0;$i<count($quantity);$i++){
  if(empty($quantity[$i])){
    $quantity[$i]=1;
  }
}
for($i=0;$i<count($offers);$i++){
  $offer =  getOffer($offers[$i]);
?>

<tr> 
 <td><img src="<?php echo "./images/".$offer[0][2];?>" alt="" width="100px"></td>   
<td><?php echo $name[$i]?></td>
<td><?php echo $quantity[$i]?></td>
<td><?php echo $price[$i]*$quantity[$i]?></td>
</tr>
<tr>
 <?php 
 }



for($i=count($offers);$i<count($quantity);$i++){
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

<?php 
if(isset($_POST["confirm"])){

echo "Order is submitted , estimated time delivery 40 minutes ";
}
?>

</div>

</center>
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
  