<?php 
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}

include("../Components/head2.php"); ?>

<link rel="stylesheet" href="../assets/css/add.css">

<body >
    
    <div class="wrapper">

        <?php include("../Components/sideBar2.php");?>

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

            <div class="content" style="margin-right:25px;">
            <center>
                <div style="width: 600px;">

                    <h2 style="margin-bottom:70px;color:rgb(43,96,142);">Edit Table</h2>
                    <?php 
                    require("../functions.php");
                    $table = getTable($_GET["id"]);
                    ?>
                    <form method="post" action="../tables.php" >
                    <p style="font-size: 21px;margin-bottom:30px;">Table ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  value="<?php echo $table[0][0];?>"  
                    type="number" 
                    name="id" 
                    min="0" 
                    readonly
                    style="width: 70px;"></p>
                        <p style="font-size: 21px;">Number of Chairs: <input  value="<?php echo $table[0][2];?>"  type="number" name="numberChairs" min="0" style="width: 70px;"></p><br/>
                        <p style="font-size: 21px;">Occupied <input <?php echo $table[0][1]?"checked":"";?> type="checkbox" name="isFree" style="width: 20px;height:20px;"></p><br/>
                        
                        <input class="cancel" type="submit" name="cancel" value="Cancel">
                        <input class="create" type="submit" name="edit" value="Edit">

                    </form>
                    
                </div>
                </center>
            </div>

        </div>
    </div>

</body>

<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script>

var element=  document.getElementById("table");
element.classList.add("nav-item");
element.classList.add("active");

</script>