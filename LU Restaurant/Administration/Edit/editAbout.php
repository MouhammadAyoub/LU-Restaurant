<?php
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}
require("../functions.php");
if(isset($_POST["update"])){

    if( empty($_POST["description"]) || empty($_POST["phone"]) || empty($_POST["adress"]) || empty($_POST["openTime"]) || empty($_POST["closeTime"]) )
            $message = "All fields must be filled out";
    else{
        editAbout($_POST["description"],$_POST["phone"],$_POST["adress"],$_POST["openTime"],$_POST["closeTime"]);
        header("Location:../about.php");
    }
}


if(isset($_POST["cancel"])){
    header("Location:../about.php");
}


?>


<?php include("../Components/head2.php"); ?>

<style>

input[type=text]{
width: 50%;
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
margin-right:70px;
background:red;
}

.cancel:hover{
    background:#880000;
}

</style>

<body >
    
    <div class="wrapper">

        <?php include("../Components/sideBar2.php");?>

        <div class="main-panel">

        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> About </p>
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

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Edit About</h2>

                    <?php $about = getAbout(); ?>

                    <form method="post" action="./editAbout.php">
                        
                        <p style="color:red"><?php echo isset($message)?$message:"";?></p>
                        
                        <span style="font-size: 22px;">Description: </span><input type="text" name="description" value="<?php echo count($about)?$about[0][0]:""; ?>" placeholder="Description"><br/>
                        <span style="font-size: 22px;">Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" name="phone" value="<?php echo count($about)?$about[0][1]:""; ?>" placeholder="Phone Number"><br/>
                        <span style="font-size: 22px;">Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" name="adress" value="<?php echo count($about)?$about[0][2]:""; ?>" placeholder="Adress"><br/>
                        <span style="font-size: 20px;">Open Time : <input style="margin:10px;" type="time" name="openTime" value="<?php echo count($about)?$about[0][3]:""; ?>"></span><br/>
                        <span style="font-size: 20px;">Close Time : <input style="margin:10px;" type="time" name="closeTime" value="<?php echo count($about)?$about[0][4]:""; ?>"></span><br/>
                       

                        

                        <input class="cancel" type="submit" name="cancel" value="Cancel">
                        <input class="create" type="submit" name="update" value="Update">

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

var element=  document.getElementById("about");
element.classList.add("nav-item");
element.classList.add("active");

</script>