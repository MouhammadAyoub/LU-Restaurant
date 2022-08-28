<style>

#menu{
      color: #ffbe33;
  }

.form-control{
    margin-top: 30px;
    margin-bottom: 30px;
}

</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
<link rel="stylesheet" href="./css/rating.css">
<?php

require("./functions.php");


if(isset($_POST["cancel"])){
  header("Location:./menu-page.php");
}
$name = $_GET["name"];
if(isset($_POST["feedbackResult"])){
  if(!empty($_POST["tel"])){

    $tel=$_POST["tel"];
    if(check_customer($_POST["tel"]))
      header("Location:./rating.php?name=$name&tel=$tel");

    else header("Location:addCustomer-page.php?name=$name&tel=$tel");
  }
  else{
    $message = "You must fill all fields";
  }
}

include("./components/general/head.php");
include("./components/general/header2.php");


  
  
?>


<body class="sub_page">

      <div style="text-align: center;">
        <center><h1 style="margin:80px 0px 60px 0px; font-size:45px;"><B>Rate The Item : <?php echo $_GET["name"];?></B></h1></center>
      </div>
      <div style="padding: 0px 570px;">
            <center>
            <form action="rate.php?name=<?php echo $_GET["name"];?>" method="post">

              <p style="color:red;"><?php echo isset($message)?$message:""; ?></p>

              <input type="tel" class="form-control" placeholder="Phone Number"  name="tel"/>
            
              <br/>

              <input style="  display: inline-block;
                              padding: 8px 30px;background-color: gray;
                              color: #ffffff;
                              margin-right:35px;
                              border-radius: 45px;
                              border: none;
                              margin-bottom:100px;"
                      type="submit" value="Cancel" name="cancel"/> 

              <input style="  display: inline-block;
                            padding: 8px 30px;background-color: #ffbe33;
                            color: #ffffff;
                            border-radius: 45px;
                            border: none;
                            margin-bottom:100px;"
                            type="submit" value="submit" name="feedbackResult"/> 
              
            </form>
            </center>
            </div>

<?php  include("./components/general/footer.php");?>
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
  <script src="js/rating.js"></script>
