<?php 
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}
include("../Components/head2.php"); ?>


<style>

input[type=text],textarea,input[type=datetime-local]{
width: 45%;
padding: 10px 10px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}

.create{
    width: 26%;
font-size: 18px;
background:rgb(53,116,182);
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
margin-right:70px;
border-radius: 8px;
cursor: pointer;
}

.create:hover{
    background:#000088;
}

.cancel{
    width: 26%;
font-size: 18px;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 8px;
cursor: pointer;

background:red;
}

.cancel:hover{
    background:#880000;
}

input[type=file]::file-selector-button {

    border: 2px solid #333333;
    padding: .2em .4em;
    border-radius: .2em;
    background-color: white;
}

input[type=file]::file-selector-button:hover {
    background-color: #AAAAAA   ;
}

</style>

<body >
    
    <div class="wrapper">

        <?php include("../Components/sideBar2.php");?>

        <div class="main-panel">

            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Reservations </p>
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

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Delete Reservation</h2>

                    <?php 
                        require("../functions.php");
                        $reservation = getReservation($_GET["id"],$_GET["phone"]);
                        $date = str_replace(' ','T',$reservation[0][4]);
                    ?>

                    <form method="post" action="../reservations.php" >

                    <span style="font-size: 22px;">Name: &nbsp;&nbsp;&nbsp;</span><input type="text" name="name" value="<?php echo $reservation[0][1]; ?>" readonly><br/>
                    <span style="font-size: 22px;">Phone: &nbsp;&nbsp;&nbsp;</span><input type="text" name="phone" value="<?php echo $reservation[0][0]; ?>" readonly><br/>
                    <span style="font-size: 22px;">Table ID: </span><input type="text" name="tableID" value="<?php echo $reservation[0][2]; ?>" readonly><br/>
                    <span style="font-size: 22px;">Guests: &nbsp;&nbsp;</span><input type="text" name="guests" value="<?php echo $reservation[0][3]; ?>" readonly><br/>
                    <span style="font-size: 22px;">Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input style="margin-bottom: 30px;" type="datetime-local" name="date" readonly value="<?php echo $date; ?>" ><br/>
                        

                        <input class="create" type="submit" name="cancel" value="Cancel">
                        <input class="cancel" type="submit" name="delete" value="Delete">

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

var element=  document.getElementById("reservation");
element.classList.add("nav-item");
element.classList.add("active");

</script>