<style>
#slider-popup{
  box-shadow: 2px 2px 2px 2px  #888888;
  width:400px;
  height:300px;  
  margin-top: 100px;
  margin-bottom: 10px;
}
.arrow{
color:black;
font-size: 30px;
}

</style>

<?php 
    require("./functions.php");
    if(isset($_GET["itemId"])){
        $itemId = $_GET["itemId"];  
    }
    $images = getImages($itemId);
    $nbi= count($images);
    if(isset($_GET["imageId"])){
        $id_current = $_GET["imageId"];
        if($id_current == 0){
            $id_previous=$nbi-1;
        }
        else{
            $id_previous = $id_current-1;
            }
        if($id_current == $nbi-1){
            $id_next = 0;
        }
        else{
            $id_next =  $id_current+1;
            }
        }
        else{
            $id_current =0;
            $id_previous = $nbi-1;
            $id_next = 1 % $nbi;
        }
?>
    <center>
<div id="slider-popup">
    <a href="<?php echo"item-page.php?itemId=$itemId&imageId=".$id_previous;?>" class="arrow">
        <b><</b>
    </a>
    <?php  $p=$images[$id_current][2]; $path ="./images/$p"; ?>
    <img src="<?php echo $path;?>"  height=300   width=300 >
    <a href='<?php echo "item-page.php?itemId=$itemId&imageId=".$id_next;?>'class="arrow">
        <b>></b>
    </a>
            </div>
            <a class="back" href="menu-page.php"><button style="
                padding: 8px 30px;background-color: #ffbe33;
                color: #ffffff;
                border-radius: 45px;
                border: none;
              margin-bottom:100px;">Back</button></a>
        </center>
         
