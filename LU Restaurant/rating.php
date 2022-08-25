<?php
require("./functions.php");

if(isset($_POST["cancel"])){
    header("Location:./menu-page.php");
  }

?>

<style>

  #menu{
      color: #ffbe33;
  }

.form-control{
    margin-top: 30px;
    margin-bottom: 30px;
}

.toast-custom {

  top: 100px;
  right: 10px;
}

.form-control{
  margin-top: 30px;
  margin-bottom: 30px;
}


.cart_link{
  color:white;
}

.cart_link:hover{
  color:#ffbe33;
}

.shop{
  margin-left: 20px;
}

</style>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> LU Restaurant </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="./css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="./css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="./css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/rating.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>

<body class="sub_page">
  
<div class="hero_area">
    <div class="bg-box">
      <img src="./images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
  
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand"  href="index.php">
            <span >
              LU Restaurant
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link"  id="home" href="./index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" id="menu" href="./menu-page.php">Menu</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" id="reservations" href="./reservations-page.php">Reservations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="feedback" href="./feedback-page.php">Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="about" href="./about-page.php">About</a>
              </li>
            </ul>
            <div class="user_option">
             
              <a class="cart_link" href="./order-list.php">
                Order List       
                <svg version="1.1" id="Capa_1" class="shop"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
              </a>
             
              </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
<?php

$comment = "";
$rating = "";

if(isset($_POST["feedbackResult"])){
    $message="";
    $tel =  $_GET["tel"];
    $name = $_GET["name"];
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
   
    
    if(empty($comment) || empty($rating)){
      $message = "You must fill all fields";
      echo '<script src="./js/jquery-3.4.1.min.js"></script>';
      echo '<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>';
      echo '<script type="text/javascript">';
      echo 'toastr.options = {"positionClass" : "toast-custom"};';
      echo 'toastr.error("An error occurred while sending your feedback");';
      echo '</script>';
    }
  
    else{
      rateItem($tel,$comment,$name,$rating);
      echo '<script src="./js/jquery-3.4.1.min.js"></script>';
      echo '<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>';
      echo '<script type="text/javascript">';
      echo 'toastr.options = {"positionClass" : "toast-custom"};';
      echo 'toastr.success("Your feedback has been submitted successfully");';
      echo '</script>';
    }
  }
?>
</div>

      <div style="text-align: center;">
        <center><h1 style="margin:80px 0px 40px 0px; font-size:45px;"><B>Rate The Item : <?php echo $_GET["name"];?></B></h1></center>
      </div>
        
      <div>
        <center>
        <form action="rating.php?name=<?php echo $_GET["name"];?>&tel=<?php echo $_GET["tel"];?>" method="post">

            <p style="color:red;"><?php echo isset($message)?$message:""?></p>

            <div class="rating" style="margin-bottom: 40px;">
                <div class="rateyo" id= "rateYo"
                    data-rateyo-rating="<?php echo !empty($rating)?$rating:'0'; ?>"
                    data-rateyo-num-stars="5"
                    data-rateyo-full-star="true"
                    data-rateyo-score="3">
                </div>
                <input type="hidden" name="rating">
            </div>

            <textarea   style="width: 500px; height: 150px;"
                        placeholder="Enter your feedback..."
                        name="comment"><?php echo !empty($comment)?$comment:''; ?></textarea>

            <br/><br/><br/>

            <input style="  display: inline-block;
                        padding: 8px 30px;background-color: gray;
                        color: #ffffff;
                        border-radius: 45px;
                        margin-right:35px;
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

</body>

<footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  <?php $about = getAbout();
                        echo $about[0][2]; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call <?php echo $about[0][1]; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  lu_restaurant@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              LU Restaurant
            </a>
            <p>
              Bla Bla Bla Bla
            </p>
            <div class="footer_social">

                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 9px;" width="26" height="26" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 9px;" width="26" height="26" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
                
                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 9px;" width="26" height="26" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 9px;" width="26" height="26" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 9px;" width="26" height="26" fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"/>
                </svg>

            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
          <?php echo substr($about[0][3],0,5); ?> - <?php echo substr($about[0][4],0,5); ?>
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="./index.php" > &nbsp; LU Restaurant</a><br><br>
        </p>
      </div>
    </div>
  </footer>

 <!-- jQery -->
 <script src="./js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="./js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="./js/custom.js"></script>
  <script src="./js/rating.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>

    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>