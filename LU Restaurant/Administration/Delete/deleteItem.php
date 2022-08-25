<?php
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
} 
include("../Components/head2.php"); ?>

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
margin-left:30px;
background:red;
position: relative;
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

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Delete item</h2>

                    <form method="post" action="../menus.php" >
                        Item Name
                        <br/>
                        <?php 
                    require("../functions.php");
                    $item =getItem($_GET["id"]);?>
                        <input type="text" name="item_name" value="<?php echo $item[0][1];?>" readonly><br/>
                       Description<br/>
                        <textarea name="item_description" readonly><?php echo $item[0][2];?></textarea>   <br/>
                        Price<br/>
                        <input type="number" min="0" value="<?php echo $item[0][3];?>"name="Price" placeholder="Price in LL" readonly>   <br/>
                        Rating Average<br/>
                        <input type="number" step="0.1" name="rating_avg" readonly value="<?php echo $item[0][4];?>"><br/>
                        Date<br/>
                        <input type="datetime-local" value="<?php  
                                        $date = date("Y-m-d\TH:i:s", strtotime($item[0][5])); 
                                      echo $date;?>" readonly >
                      <br/>
                        <br/>

                        



<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                               
                                <div class="card-body  table-responsive">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                    <thead>
                                            <th>Image</th>
                                           
                                            
                                        </thead>
                                        <tbody>
                                      
                                        <?php getItemImages_delete($item[0][0]); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

                        
                        <input class="create" type="submit" name="cancel" value="Cancel">
                        <input class="cancel" type="submit" name="delete_item" value="Delete">
                        

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