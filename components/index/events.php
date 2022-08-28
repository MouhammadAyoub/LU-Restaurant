

<link rel="stylesheet" href="./css/event.css">

<center>
<h1 style="margin: 50px 0px 140px 0px; font-size:45px;"><B>New Events</B></h1>
<div class="row"> 
   
<?php 
$events= getNewEvents();

foreach($events as $event){

?>  

   <div class="event-card" style="background-size:500px;border-radius: 20px;box-shadow: 7px 7px 7px 7px  #222831;background-image:url(<?php echo"./images/".$event[1];?>);  width:500px;height:330px;">

      <h1 style="margin-top:30px;font-size: 45px;"><span style="text-shadow: 0 0 5px #0000FF, 0 0 20px #FFFFFF;"><b><?php echo $event[2];?></b></span></h1>

      <p class="date" style="margin-top:10px;font-size: 22px;"><?php echo substr($event[4],0,16);?></p>

   <p style="font-size: 20px;margin:30px 40px 0px 40px;"><?php echo$event[3];?></p>

   </div>

<?php }
?>

</div>
</center>
