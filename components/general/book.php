<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

<style>

.toast-custom {

  top: 100px;

  right: 10px;
}
</style>

<?php
$name = "";
$phone = "";
$guestNbr = "";
$date = "";
if(isset($_POST["reserve"])){
  if( empty($_POST["name"]) || empty($_POST["phone"]) || empty($_POST["guestNbr"]) || empty($_POST["date"]) ){
    
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    if(isset($_POST["guestNbr"])) $guestNbr = $_POST["guestNbr"];
    $date = $_POST["date"];
    $message = "All fields must be filled out";
  }
  else{
    $message = "";
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $guestNbr = $_POST["guestNbr"];
    $date = $_POST["date"];
    $dateNow = date('Y-m-d H:i:s',strtotime($_POST["date"]));
    $dateBefore = date('Y-m-d H:i:s',strtotime('-2 hour',strtotime($dateNow)));
    $dateAfter = date('Y-m-d H:i:s',strtotime('+2 hour',strtotime($dateNow)));
    
    $result = reserveTable($_POST["name"],$_POST["phone"],intval($_POST["guestNbr"]),$dateBefore,$dateNow,$dateAfter);
    if($result){
      echo '<script src="./js/jquery-3.4.1.min.js"></script>';
      echo '<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>';
      echo '<script type="text/javascript">';
      echo 'toastr.options = {"positionClass" : "toast-custom"};';
      echo 'toastr.success("Your reservation has been completed successfully");';
      echo '</script>';
    }
    else{
      echo '<script src="./js/jquery-3.4.1.min.js"></script>';
      echo '<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>';
      echo '<script type="text/javascript">';
      echo 'toastr.options = {"positionClass" : "toast-custom"};';
      echo 'toastr.error("Your reservation failed.");';
      echo '</script>';
    }
  }
}
  

?>

<style>

.form-control {
  width: 40%;
}

.form_container {
  width: 40%;
}

input[type=submit]{
  margin-top: 15px;
  border: none;
  text-transform: uppercase;
  display: inline-block;
  padding: 10px 55px;
  background-color: #ffbe33;
  color: #ffffff;
  border-radius: 45px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  border: none;
}

input[type=submit]:hover {
  background-color: #e69c00;
}

</style>


<!-- book section -->
  <section class="book_section layout_padding">
    <div>
      <div >
      <center><h1 style="margin:20px 0px 90px 0px; font-size:45px;"><B>Book A Table</B></h1></center>
      </div>
      <div >
        <div >
          <center>
          <div class="form_container">

            <form action="./reservations-page.php" method="post">

            <p style="color:red"><?php echo isset($message)?$message:"";?></p>

              <div>
                <input type="text"  class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="Phone Number" />
              </div>
              <div>
                <select class="form-control nice-select wide" name="guestNbr" >
                  <option value="" disabled <?php echo $guestNbr==""?"selected":""; ?>>
                    How many persons?
                  </option>
                  <option value="1" <?php echo $guestNbr=="1"?"selected":""; ?>>
                    1
                  </option>
                  <option value="2" <?php echo $guestNbr=="2"?"selected":""; ?>>
                    2
                  </option>
                  <option value="3" <?php echo $guestNbr=="3"?"selected":""; ?>>
                    3
                  </option>
                  <option value="4" <?php echo $guestNbr=="4"?"selected":""; ?>>
                    4
                  </option>
                  <option value="5" <?php echo $guestNbr=="5"?"selected":""; ?>>
                    5
                  </option>
                  <option value="6" <?php echo $guestNbr=="6"?"selected":""; ?>>
                    6
                  </option>
                  <option value="7" <?php echo $guestNbr=="7"?"selected":""; ?>>
                    7
                  </option>
                  <option value="8" <?php echo $guestNbr=="8"?"selected":""; ?>>
                    8
                  </option>
                  <option value="9" <?php echo $guestNbr=="9"?"selected":""; ?>>
                    9
                  </option>
                  <option value="10" <?php echo $guestNbr=="10"?"selected":""; ?>>
                    10
                  </option>
                </select>
              </div>
              <div>
                <input type="datetime-local" name="date" value="<?php echo $date; ?>" class="form-control">
              </div>
              <div class="btn_box" style="margin-top: 50px;margin-bottom:-30px;">
                <input type="submit" name="reserve" value="Book Now">
              </div>
            </form>

            
          </div>
          </center>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->
