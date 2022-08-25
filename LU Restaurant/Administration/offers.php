<?php 
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:index.php");
}
require("./functions.php"); 
if(isset($_POST["edit"])){

    $dir = "../images";
    if(is_uploaded_file($_FILES["image"]["tmp_name"]))
        move_uploaded_file($_FILES["image"]["tmp_name"],$dir."/".$_FILES["image"]["name"]);

    editOffer($_POST["id"],$_POST["offer_name"],$_POST["Offer_Price"],$_POST["description"],$_FILES["image"]["name"],$_POST["selected"]);
}
if(isset($_POST["delete"])){
    deleteOffer($_POST["id"]);
}

include("./Components/head.php"); ?>

<body >
    
    <div class="wrapper">

        <?php include("./Components/sideBar.php");?>

        <div class="main-panel">

        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Offers </p>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

           <a href="Add/addOffer.php"> <button style="color:white;margin-top:20px;float:right; background-color:rgb(55,119,185); border:none;padding:10px;border-radius:5px;margin-right:20px;">Add new Offer &nbsp; <i class="bi bi-plus-square-fill"></i></button>
</a>
            <br/>

            <div class="content" style="margin-top:30px; margin-right:25px;">

                <?php include("./Components/offer-list.php");?>

            </div>

        </div>
    </div>

</body>

<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="./assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/js/demo.js"></script>

<script>

var element=  document.getElementById("offer");
element.classList.add("nav-item");
element.classList.add("active");

</script>