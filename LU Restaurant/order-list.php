<?php   session_start();
        require("./functions.php"); ?>

<style>

#order{
      color: #ffbe33;
  }

.form-control{
    margin-top: 30px;
    margin-bottom: 30px;
}

</style>

<body class="sub_page">

  <?php 
  include("./components/general/head.php");
    include("./components/general/header2.php");
    
  ?>

<div style="width: 100%;text-align:center;padding:0px 500px;">
  
  <center><h1 style="margin:80px 0px; font-size:45px;"><B>Orders List</B></h1></center>
  
  <form action="order-process.php" method="post">
    <input type="text" name="firstName" class="form-control" placeholder="Your First Name" />
    <input type="text" name="lastName" class="form-control" placeholder="Your Last Name" />
    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" />
    <input type="text"name="address" class="form-control" placeholder="Address" style="margin-bottom: 70px;"/>
  
    <ul style="margin-left: -45px;">
    <?php  if(isset($_SESSION["offers"])){
            $offers =$_SESSION["offers"];
            $i=0;
            foreach($offers as $id){
            $offer = getOffer($id);
            
          ?>
  <!-- order item -->
    <li style="list-style: none; margin-bottom: 100px;">

    <p style="font-size:25px;margin-bottom:30px;"><?php echo $offer[0][1];?></p>

      <!--item image-->
      <input type ="hidden" name="name[]" value="<?php echo $offer[0][1]?>">
      <img src="<?php echo "./images/".$offer[0][2];?>" alt="" height="220px"  style="border-radius:110px;margin-bottom:30px;"/><br/>

      <a href="./delete.php?offer_id=<?php echo $i; ?>">  <input style="  display: inline-block;
                padding: 8px 30px;background-color: #ff0000;
                color: #ffffff;
                border-radius: 45px;
                border: none;
                margin-top:50px;
                margin-bottom:50px;"
        type="button" value="Delete" name="delete"/></a>
      <input type="number" name="quantity[]"  min="1"  step="any" style="width: 60px;font-size:20px;margin-left:40px;">
      
      <input type="text" value="<?php echo $offer[0][4];?>" name="price[]" style="margin-left:10px;width: 80px;font-size:20px;border: none;" readonly ><span style="font-size:20px;">L.L</span>
 
    </li>
    <?php $i++; }} 
    ?>
      <?php  
        if(isset($_SESSION["orders"])){
        $orders =$_SESSION["orders"];
       $j=0;
        foreach($orders as $id){
          $order = getItem($id);
          $image = getImage($id);
          ?>
  <!-- order item -->
    <li style="list-style: none; margin-bottom: 100px;">

    <p style="font-size:25px;margin-bottom:30px;"><?php echo $order[0][1];?></p>
      <!--item image-->
      <input type ="hidden" name="name[]" value="<?php echo $order[0][1]?>">
      
      <img src="<?php echo "./images/".$image[0][0]?>" alt="" height="220px" style="border-radius:110px;margin-bottom:10px;"/><br/>
      <a href="./delete.php?item_id=<?php echo $j;?>"><input style="  display: inline-block;
                padding: 8px 30px;background-color: #ff0000;
                color: #ffffff;
                border-radius: 45px;
                border: none;
                margin-top:50px;
                margin-bottom:50px;"
        type="button" value="Delete" name="delete"/></a>
        <input type="number" name="quantity[]"  min="1"  step="any" style="width: 60px;font-size:20px;margin-left:40px;">

        <input type="text" value="<?php echo $order[0][3]?>" name="price[]" style="margin-left:10px;width: 80px;font-size:20px;border: none;" readonly ><span style="font-size:20px;">L.L</span>
        
    </li>
<?php   
       $j++; }  
      }
      
?>
  </ul>
  <input style="  display: inline-block;
                padding: 8px 30px;background-color: #ffbe33;
                color: #ffffff;
                border-radius: 45px;
                border: none;
                margin-top:50px;
                margin-bottom:100px;"
        type="submit" value="Place Order" name="submit"/>
  </form > 
</div >

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
  