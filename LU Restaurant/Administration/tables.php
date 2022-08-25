<?php
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:index.php");
}
require("./functions.php"); 
if(isset($_POST["create"])){
addTable( $_POST["table_id"] ,$_POST["numberChairs"]);
}
if(isset($_POST["edit"])){
    $is_free = isset($_POST["isFree"])?1:0;
    editTable($_POST["id"],$is_free,$_POST["numberChairs"]);
}
if(isset($_POST["delete"])){
 deleteTable($_POST["id"]);
}

?>




<?php include("./Components/head.php"); ?>

<body >
    
    <div class="wrapper">

        <?php include("./Components/sideBar.php");?>

        <div class="main-panel">
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Tables </p>
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

            <div class="content" style="margin-top:30px; margin-right:25px;">

                <?php include("./Components/table-list.php");?>

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

var element=  document.getElementById("table");
element.classList.add("nav-item");
element.classList.add("active");

</script>