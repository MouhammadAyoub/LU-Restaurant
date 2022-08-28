<?php
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}

include("../Components/head2.php"); ?>
<link rel="stylesheet" href="../assets/css/add.css">


<?php

require("../functions.php");

if(isset($_POST["create"])){ 

    $message="";
    $item_name= $_POST["item_name"];
    $Price = $_POST["Price"];
    $item_description =  $_POST["item_description"];
    $images = $_FILES["images"]["name"];

    if(empty($item_name)||empty($item_description)||empty($Price) || empty($images)){
        $message = "You must fill all fields";
    }
    else{
        $i=0;
        foreach($_FILES['images']['name'] as $file){
            if(empty($file))
                $images[$i] = null;
            else {
                $images[$i] = $_FILES['images']['name'][$i];

                $dir = "../../images";
                if(is_uploaded_file($_FILES["images"]["tmp_name"][$i]))
                    move_uploaded_file($_FILES["images"]["tmp_name"][$i],$dir."/".$_FILES["images"]["name"][$i]);
            }
            $i++;
        }
        if($images[0]==null){
            $message = "You must fill all fields";}
        else{
            if(check_item_name($item_name)==false){
                $message= "This item name is already exist";    
            }
            else{

                

                addItemInMenu($item_name,$item_description,$Price,$images,$_GET['id']);
                header("Location:../menus.php");
            }
        }
    }
}
if(isset($_POST["cancel"])){
    header("Location:../menus.php");
}

?>




<style>

input[type=text],input[type=number],textarea{
width: 80%;
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
input[type=file]::file-selector-button {

border: 2px solid #333333;
padding: .2em .4em;
border-radius: .2em;
background-color: white;
}

input[type=file]::file-selector-button:hover {
background-color: #AAAAAA   ;
}
input[type=file] {
margin-top: 20px;
margin-bottom: 30px;
}



</style>

<body >
    
    <div class="wrapper">

        <?php include("../Components/sideBar2.php");?>

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

            <div class="content" style="margin-right:25px;">
            <center>
                <div style="width: 600px;">

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Add New Item</h2>

                    <form method="post" action="../Add/addItem.php?id=<?php echo $_GET['id'];?>"  enctype="multipart/form-data">
                    <p class="error"><?php echo isset($message)?$message:""?></p>
                        <input type="text" name="item_name" placeholder="Item Name"><br/>
                       
                        <textarea name="item_description" placeholder="Item Description"></textarea>   <br/>
                        <input type="number" min="0" name="Price" placeholder="Price in LL">   <br/> 
                      
                        <input type="file" name="images[]" id="images" multiple >
                        <br/>
                        

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

var element=  document.getElementById("menu");
element.classList.add("nav-item");
element.classList.add("active");

</script>