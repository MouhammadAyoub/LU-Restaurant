<?php 
session_start();
if(!isset($_SESSION["is_super"])){
    header("Location:../index.php");
}
if(isset($_POST["create"])){

    if( $_FILES["image"]['name']=='' || empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["date"]) )
            $message = "All fields must be filled out";
    else{

        require("../functions.php"); 
        
        $dir = "../../images";
        if(is_uploaded_file($_FILES["image"]["tmp_name"]))
            move_uploaded_file($_FILES["image"]["tmp_name"],$dir."/".$_FILES["image"]["name"]);

        $date = str_replace('T',' ',$_POST["date"]).":00";
        addEvent( $_FILES["image"]["name"], $_POST["name"], $_POST["description"], $date);
        
        header("Location:../events.php");
    }
}


if(isset($_POST["cancel"])){
    header("Location:../events.php");
}

?>


<?php include("../Components/head2.php"); ?>

<style>

input[type=text],textarea,input[type=datetime-local]{
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

</style>

<body >
    
    <div class="wrapper">

        <?php include("../Components/sideBar2.php");?>

        <div class="main-panel">

            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Events </p>
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

                    <h2 style="margin-bottom:40px;color:rgb(43,96,142);">Add New Event</h2>

                    <form method="post" action="./addEvent.php" enctype="multipart/form-data">

                        <p style="color:red"><?php echo isset($message)?$message:"";?></p>

                        <input type="text" name="name" placeholder="Name"><br/>
                        <textarea name="description" placeholder="Description"></textarea><br/>
                        <input type="datetime-local" name="date"><br/>
                        <input style="margin-top:20px; margin-bottom:20px;margin-left:80px;" type="file" name="image"><br/>

                        

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

var element=  document.getElementById("event");
element.classList.add("nav-item");
element.classList.add("active");

</script>