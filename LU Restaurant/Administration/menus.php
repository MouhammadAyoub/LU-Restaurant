<?php 
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:index.php");
}

require("./functions.php");
if(isset($_POST["delete_menu"])){
    deleteMenu($_POST["menu_name"]);
  
  }

  if(isset($_POST["edit_menu"])){
    editMenu($_GET["oldMenuName"],$_POST["menu_name_new"]);
 
  }
  if(isset($_POST["delete_item"])){
    deleteItem($_POST["item_name"]);
  
  }
  if(isset($_POST["edit_item"])){
    $i=0;
    foreach($_FILES['images']['name'] as $file){
        if(empty($file))
        {
            $images[$i] = null;
        }
        else{ 
            $images[$i] = $_FILES['images']['name'][$i];
            $dir = "../images";
                if(is_uploaded_file($_FILES["images"]["tmp_name"][$i]))
                    move_uploaded_file($_FILES["images"]["tmp_name"][$i],$dir."/".$_FILES["images"]["name"][$i]);
                }
        $i++;
    }
    if(!isset($_POST["deleted_images"]))
         $_POST["deleted_images"]=null;
    editItem($_GET["name"],$_POST["item_name_new"],$_POST["item_description"],$_POST["Price"],$_POST["deleted_images"],$images);
  }

include("./Components/head.php"); ?>

<body >
    
    <div class="wrapper">

        <?php include("./Components/sideBar.php");?>

        <div class="main-panel">

        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Menus </p>
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

           <a href="Add/addMenu.php"> <button style="color:white;
            margin-top:20px;
            float:right; background-color:rgb(55,119,185);
             border:none;padding:10px;
             border-radius:5px;
             margin-right:20px;">Add new Menu &nbsp; <i class="bi bi-plus-square-fill"></i></button></a>
    
            <br/>

            <div class="content" style="margin-top:30px; margin-right:25px;">

                <?php include("./Components/menu-list.php");?>

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

var element=  document.getElementById("menu");
element.classList.add("nav-item");
element.classList.add("active");

</script>