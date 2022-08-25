<?php
session_start();
require("./functions.php");
$mysqli_connect = connect();

if(isset($_POST["Signin"])){
$sql="SELECT IS_SUPER, ADMIN_USERNAME, PASSWORD FROM admin WHERE ADMIN_USERNAME=? AND PASSWORD=? ";
$stmt=$mysqli_connect->prepare($sql);
$stmt->bind_param("ss",$_POST['username'],$_POST['password']);
$stmt->execute();
$arr=$stmt->get_result()->fetch_all();
//print_r($arr);echo "c=".count($arr);
 
if(count($arr)==1){
    $x=$_POST['username'];
    $_SESSION['is_super'] = $arr[0][0];
    header("Location: menus.php");
    
    exit;
    }
else{
    $message = "Incorrect password or username";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./assets/css/sign-in.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body style="background-image: url('./assets/img/test6.jpg');background-size: cover;">

<div style='padding-top: 5px;'>

<center><div class="sign-in" style="opacity: 0.98;height:max-content" >

<h2 style="padding-top: 30px;color: rgb(196, 139, 87);font-size: 27px;">Administration</h2>
<form action="index.php" method="post" >
    <p style="color:red"><?php echo isset($message)?$message:"";?></p>
<input type="text" name="username" class="field" placeholder="Username" style="background-color: rgb(244, 244, 244);"><br/>
<input type="password" name="password" class="field" placeholder="Password" style="background-color: rgb(244, 244, 244);"><br/>
<input type="submit"  name="Signin"  value="Login"class="login" style="font-size: 20px;background-color: rgb(196, 139, 87);margin-bottom: 40px;">  </br>
</form>

</div></center>

</div>

</body>
</html>