<?php
session_start();
require("../functions.php");
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}
if(isset($_POST["create"])){
    $message="";
$username= $_POST["username"];
$password = $_POST["password"];
$name =  $_POST["name"];
$tel = $_POST["telephone"];
$is_super = filter_input(INPUT_POST, 'isSuper');
$is_super= $is_super == "on"?true:false;

if(empty($username)||empty($password)||empty($tel)||empty($name)){
    $message = "You must fill all fields";
}
else{
    if(check_username($username)==false){
        $message= "This username is already exist";    
    }
    else{
        addAdmin($username,$password,$name,$tel,$is_super);
        header("Location:../admins.php");
        }
    }
   
}
if(isset($_POST["cancel"])){
    header("Location:../admins.php");
}

?>




<?php include("../Components/head2.php"); ?>
<link rel="stylesheet" href="../assets/css/add.css">


<body >
    
    <div class="wrapper">

        <?php include("../Components/sideBar2.php");?>

        <div class="main-panel">


        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Admins </p>
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

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Add New Admin</h2>

                    <form method="post" action="../Add/addAdmin.php" enctype="multipart/form-data">
<p class="error"><?php echo isset($message)?$message:""?></p>
                        <input type="text" name="username" placeholder="Username"><br/><br/>
                        <input type="password" name="password" placeholder="Password"><br/><br/>
                        <input type="text" name="name" placeholder="Name"><br/><br/>
                        <input type="tel" pattern="[0-9]{2}[0-9]{3}[0-9]{3}" name="telephone" placeholder="Phone Number"><br/><br/>
                        <p style="font-size: 21px;">Is Super <input type="checkbox" name="isSuper" style="width: 20px;height:20px;"></p><br/>

                        <input class="cancel" type="submit" name="cancel" value="Cancel">
                        <input class="create" type="submit" name="create" value="Create">

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

var element=  document.getElementById("admin");
element.classList.add("nav-item");
element.classList.add("active");

</script>