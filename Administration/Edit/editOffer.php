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
margin-right:70px;
background:red;
}

.cancel:hover{
    background:#880000;
}
input[type=checkbox]{
    margin-left: 25px;
}
input[type=file]{
    margin-top: 25px;
    margin-bottom:25px;
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

            <div class="content" style="margin-right:25px;">
            <center>
                <div style="width: 600px;">

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Edit Offer</h2>

                    <?php 
                        require("../functions.php");
                        $offer = getOffer($_GET["id"]);
                    ?>

                    <img src="../../images/<?php echo $offer[0][2]; ?>" width="300px" style="margin-top:10px;margin-bottom:30px;">
                    <form method="post" action="../offers.php" enctype="multipart/form-data">
                        
                        <input type="text" name="offer_name"  value ="<?php echo $offer[0][1]; ?>" placeholder="Offer Name"><br/>
                        <input type="number" min="0" value="<?php echo $offer[0][4]; ?>" name="Offer_Price" placeholder="Offer Price"><br/>
                       <textarea name="description" placeholder="Offer Description"><?php echo $offer[0][3]; ?></textarea><br/>
                       
                       <p style="margin-left:120px;"><span style="font-size:20px;">Change Image</span><input style="margin-top:20px; margin-bottom:10px;margin-left:30px;" type="file" name="image"></p>



<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Items of <?php echo $offer[0][1]; ?></h4>
                                    
                               
                                    
                                </div>
                                <div class="card-body  table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Item ID</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Selected</th>
                                        </thead>
                                        <tbody>
                                            <?php getOffersItemsEdit($offer[0][0]); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>



                        
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <input class="cancel" type="submit" name="cancel" value="Cancel">
                        <input class="create" type="submit" name="edit" value="Update">

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

var element=  document.getElementById("offer");
element.classList.add("nav-item");
element.classList.add("active");

</script>