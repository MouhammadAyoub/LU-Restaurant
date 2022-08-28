<?php 
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}
include("../Components/head2.php"); ?>
<link rel="stylesheet" href="../assets/css/delete.css">

<body> 
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

                            <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Delete Admin</h2>

                    <?php 
                    require("../functions.php");
                    $admin =getAdmin($_GET["username"]);?>
                    <form method="post" action="../admins.php">

                        <input value="<?php echo$admin[0][0];?>" 
                        type="text" 
                        name="username" 
                        placeholder="Username" 
                        readonly
                            >
                        <br/><br/>
                        
                        <input value="<?php echo$admin[0][1];?>" 
                        type="password" 
                        name="password" 
                        placeholder="Password" 
                        readonly
                        >   
                        <br/><br/>
                        
                        <input value="<?php echo$admin[0][2];?>" 
                        type="text" 
                        name="name" 
                        placeholder="Name" 
                        disabled
                        >
                        <br/><br/>
                        
                        <input value="<?php echo$admin[0][3];?>" 
                        type="tel" 
                        pattern="[0-9]{3}[0-9]{2}[0-9]{3}" 
                        disabled 
                        name="telephone" 
                        placeholder="Phone Number"><br/><br/>
                        
                        <p style="font-size: 21px;">Is Super <?php if($admin[0][4]){?>
                        
                            <input  
                            type="checkbox" 
                            disabled 
                            name="isSuper" 
                            checked 
                            style="width: 20px;height:20px;">
                        <?php }
                        else{ ?>
                        <input  
                        type="checkbox" 
                        disabled 
                        name="isSuper" 
                        style="width: 20px;height:20px;"
                        >
                        
                        <?php } ?>
                    </p><br/>

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

var element=  document.getElementById("admin");
element.classList.add("nav-item");
element.classList.add("active");

</script>