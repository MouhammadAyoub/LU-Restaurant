<?php

if(isset($_POST["feedbackResult"])){

  if(empty($_POST["phone"])){

    $message = "You must enter your phone number";
  }
  else{
    if(checkCustomerExists($_POST["phone"])){

      echo "<script> location.href='./components/feedback/writesfeedbackvisit.php?phone={$_POST["phone"]}'; </script>";
      exit;
    }
    else{

      echo "<script> location.href='./components/feedback/writesfeedbackvisit.php?phone={$_POST["phone"]}&test=1'; </script>";
      exit;
    }
  }
    
}

?>

<style>
    .form-control{
    margin-top: 30px;
    margin-bottom: 30px;
    width: 400px;
}
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
<link rel="stylesheet" href="./css/rating.css">

<center>

  <h2 style="margin-top: 20px;font-size: 40px;font-weight:bold;">
      Write your visit feedback.
  </h2>

  <div style="width:500px; margin-top: 90px;">
    <form action="./feedback-page.php" method="post">
            
      <p style="color:red; margin-top:-20px;"><?php echo isset($message)?$message:"";?></p>

      <input type="tel" class="form-control" name="phone" placeholder="Phone Number" /><br/>
      
      <input style="display: inline-block;
                    padding: 8px 30px;background-color: #ffbe33;
                    color: #ffffff;
                    border-radius: 45px;
                    border: none;"
                    type="submit" value="submit" name="feedbackResult"/> 
    </form>
  </div>
</center>