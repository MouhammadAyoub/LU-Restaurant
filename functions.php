<?php
//connect to database

function connect(){
    
    $server="127.0.0.1";
    $username="root";
    $pass="Ayoub123?";
    $db="restaurantdb";
    $mysqli_connect= new mysqli($server,$username,$pass,$db);
    if($mysqli_connect->connect_error){
        exit('Error in connection');
    }
    return $mysqli_connect;

}

// New Items
function getNewItem(){
    $mysqli = connect();
    $query="SELECT ITEM_ID,NAME,ITEM_DESCRIPTION FROM item ORDER BY ITEM_ID DESC LIMIT 3";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $items =$statement->get_result()->fetch_all();
    $statement->close();
    return $items;
}

// New Offers 

function getNewOffers(){
    $mysqli = connect();
    $query="SELECT * FROM offer WHERE OFFER_ID != 1 ORDER BY OFFER_ID DESC LIMIT 3";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $offer =$statement->get_result()->fetch_all();
    $statement->close();
    return $offer;
}


// Get New Events 
function getNewEvents(){
    $mysqli = connect();
    $query="SELECT * FROM event ORDER BY EVENT_ID DESC LIMIT 3";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $events =$statement->get_result()->fetch_all();
    $statement->close();
    return $events;
}
//getItem
function getItem($id){
    $mysqli = connect();
    $query="SELECT * FROM item WHERE ITEM_ID=$id";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $item =$statement->get_result()->fetch_all();
    $statement->close();
    return $item;
}
// get Image of item
function getImage($id){
    $mysqli = connect();
    $query="SELECT PATH FROM image WHERE ITEM_ID=$id";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $image =$statement->get_result()->fetch_all();
    $statement->close();
    return $image;
}
function getOffer($id){
    $mysqli = connect();
    $query="SELECT * FROM offer WHERE OFFER_ID=$id";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $item =$statement->get_result()->fetch_all();
    $statement->close();
    return $item;
}

// check if customer already exist
function  check_if_exist($phone){
    $mysqli = connect();
    $query="SELECT * FROM customer WHERE PHONE_NB='$phone'";
    $statement =$mysqli->prepare($query);
    $statement->execute();
    $image =$statement->get_result()->fetch_all();
    $statement->close();
    return count($image) >0;
}


// add order
function add_order($phone,$item,$offer,$quantity,$price,$address){
$isproceed =1; 
date_default_timezone_set("Asia/Beirut");
$date = date("Y-m-d H:i:s");


$mysqli = connect();

$query="INSERT INTO orders(PHONE_NB,ITEM_ID,OFFER_ID,PRICE,DATE,quantity,ADDRESS,IS_PROCEED) VALUES(?,?,?,?,?,?,?,?)";

$statement =$mysqli->prepare($query);
$statement->bind_param("siiisisi",$phone,$item,$offer,$price,$date,$quantity,$address,$isproceed);
$statement->execute();
$statement->close();

}
function count_orders($id){

    
    $mysqli=connect();
    
    $query="UPDATE customer SET NB_OF_ORDER=(SELECT COUNT(*) FROM orders WHERE PHONE_NB=$id)";
    $statement= $mysqli->prepare($query);
   
    $statement->execute();
    $statement->close();
    
}

function getMenus(){
    $mysqli = connect();
    $query="SELECT * FROM MENU";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($menu_id,$title);
    
    while($statement->fetch()){
        
        echo "<li id=\"filter\" data-filter=\".$title\" style=\"margin:0px 12px;\">$title</li></a>";
        

    }

    $statement->close();
}




function getAllItems(){
    $mysqli = connect();
    $query="SELECT * FROM ITEM WHERE ITEM_ID != 1";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($item_id,$name,$item_description,$item_price,$rating_avg,$date);
    while($statement->fetch()){
        if($item_id !=0)
            showItems($item_id,$name,$item_description,$item_price,$rating_avg);
    }


}

function showItems($item_id,$name,$item_description,$item_price,$rating_avg){
    
    $menu_name = getMenuName($item_id);
    $images = getImages($item_id); 
    $path = $images[0][2];
    
    ?>
    
        <style>

            .box{
                width: 250px;
                
            }

            .item-link{
                color:white;
            }

            .arrow{
                color:#343a40;
                font-size: x-large;
                margin-left: 50px;
                margin-right: 50px;
            }

        </style>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">

    <div class="col-sm-4 col-lg-4 all <?php echo $menu_name ?> ">
                <div class="box">
                <div>
                    <div class="img-box">
                    <a href="item-page.php?itemId=<?php echo $item_id ?>">  <img src="./images/<?php echo $path ?>" alt="" /></a>
                    </div>
                    <div class="detail-box">

                    <center>

                    <h5>
                        <?php echo $name ?>
                    </h5>
                    <p>
                        <?php echo $item_description ?>
                    </p>

                    <p>
                    <div class="rating" >
                        <span class="rating__result"></span>
                            
                            <?php   $rating = round($rating_avg);
                                    $reste = 5 - $rating;

                                    while($rating > 0){ ?>

                                        <i class=" fas fa-star" style="font-size: 1.3em; color: #FFBE33;" ></i>
                                        <?php $rating--;
                                    }
                                    while($reste > 0){ ?>

                                        <i class=" far fa-star" style="font-size: 1.3em; color: #FFBE33;" ></i>
                                        <?php $reste--;
                                    }
                            ?>

                        </div>
                    </p>

                    </center>

                    <div class="options">
                    <h5 style="margin-top: 10px;"><?php echo $item_price ?> L.L</h5>


                        <a href="rate.php?name=<?php echo $name ?>">
                            <button style=" display: inline-block;
                                            padding: 8px 30px;background-color: #ffbe33;
                                            color: #ffffff;
                                            border-radius: 45px;
                                            border: none;">
                                            Rate</button>
                        </a>

                        <a href="./addToCart?item_id=<?php echo $item_id ?>">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                            <g>
                            <g>
                                <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                            c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                            </g>
                            </g>
                            <g>
                            <g>
                                <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                            C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                            c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                            C457.728,97.71,450.56,86.958,439.296,84.91z" />
                            </g>
                            </g>
                            <g>
                            <g>
                                <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                            c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                            </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g> <g>        </g>    <g></g>
                            <g>              </g><g>
                            </g>
                            <g>
               </g>
                            <g>
                            </g>
                        </svg>
                        </a>
                    </div>
                    </div>        </div>
                </div>
    </div>

    <?php
    
}

function getMenuName($item_id){
    $mysqli = connect();
    $query="SELECT * FROM MENU_ITEM WHERE ITEM_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $statement->bind_result($menu_id,$item_id);
    $menu =$statement->get_result()->fetch_all();
    $statement->close();

    $menu_id = $menu[0][0];

    $mysqli = connect();
    $query="SELECT * FROM MENU WHERE MENU_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$menu_id);
    $statement->execute();
    $statement->bind_result($menu_id,$title);
    $menu =$statement->get_result()->fetch_all();
    $statement->close();
    return $menu[0][1];
}


function getImages($item_id){

    $mysqli = connect();
    $query="SELECT * FROM IMAGE WHERE ITEM_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $statement->bind_result($image_id,$item_id,$path);
    $images =$statement->get_result()->fetch_all();
    $statement->close();
    return $images;
}


function rateItem($tel,$comment,$item_name,$item_rate){

    $item_id = getItemId($item_name);
    $mysqli = connect();
    
    $query= "INSERT INTO feedbackitems VALUES(?,?,?,?)";
    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("ssis",$tel,$item_id,$item_rate,$comment);
    $stmt->execute();
    $stmt->close();


    addCustomerWithFeedback($tel);
    updateRateItem($item_id,$item_rate);
}
function  getItemId($item_name){

    $mysqli = connect();
    $query="SELECT * FROM ITEM WHERE NAME = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("s",$item_name);
    $statement->execute();
    $item =$statement->get_result()->fetch_all();
    $statement->close();
    $item_id = $item[0][0];
    return $item_id;
}

function updateRateItem($item_id,$item_rate){

    $rating = count_rating_item($item_id);
    $nb_of_rating = count($rating);
    $avg = 0;$i=0;
    while($i<count($rating)){
        $avg+=$rating[$i][2];
        $i++;
    }
    $new_avg = ($avg)/( $nb_of_rating);
    $mysqli = connect();
    $query="UPDATE ITEM set rating_avg = $new_avg where ITEM_ID=?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $statement->close();
 
}

function oldAverage($item_id){

    $mysqli = connect();
    $query="SELECT * FROM ITEM WHERE ITEM_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $item =$statement->get_result()->fetch_all();
    $statement->close();

    $avg = $item[0][4];
    return $avg;

}

function count_rating_item($item_id){

    $mysqli = connect();
    $query="SELECT * FROM feedbackitems WHERE ITEM_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $item =$statement->get_result()->fetch_all();
    $statement->close();
    return $item;
}


function check_customer($tel){

    $mysqli = connect();
    $query= "SELECT * FROM CUSTOMER WHERE PHONE_NB = ?";

    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("s",$tel);
    $stmt->execute();
    $arr =$stmt->get_result()->fetch_all();
   
    $stmt->close();
    if(count($arr)>0){
        return true;
    }

    return false;   
}

function addCustomer($first_name,$last_name,$tel,$address){
    $mysqli = connect();
    
    $query= "INSERT INTO CUSTOMER(first_name,last_name,phone_nb,address) VALUES(?,?,?,?)";
    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("ssss",$first_name,$last_name,$tel,$address);
    $stmt->execute();
    $stmt->close();
    
}


function addCustomerWithFeedback($tel){

    $customer = getCustomer($tel);
    $mysqli = connect();
    
    $query= "INSERT INTO CUSTOMER(first_name,last_name,phone_nb,address) VALUES(?,?,?,?)";
    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("ssss",$customer[0][3],$customer[0][4],$tel,$customer[0][5]);
    $stmt->execute();
    $stmt->close();
    
}

function  getCustomerId($tel){

    $mysqli = connect();
    $query="SELECT * FROM CUSTOMER WHERE PHONE_NB = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("s",$tel);
    $statement->execute();
    $customer =$statement->get_result()->fetch_all();
    $statement->close();
    $customer_id = $customer[0][0];
    return $customer_id;
}

function  getCustomer($tel){

    $mysqli = connect();
    $query="SELECT * FROM CUSTOMER WHERE PHONE_NB = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("s",$tel);
    $statement->execute();
    $customer =$statement->get_result()->fetch_all();
    $statement->close();
    return $customer;
}

function getAbout(){

    $mysqli= connect();
    $query = "SELECT * FROM about";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $about  =  $statement->get_result()->fetch_all();
    $statement->close();
    return $about;
}

//******* FEEDBACKVISIT SECTION ******//

function  checkCustomerExists($phone){

    $mysqli = connect();
    $query="SELECT * FROM customer WHERE PHONE_NB=?";
    $statement =$mysqli->prepare($query);
    $statement->bind_param('s',$phone);
    $statement->execute();
    $result = $statement->get_result()->fetch_all();
    $statement->close();
    if(empty($result)) return false;
    return true;
}

function addFeedBack($phone,$rate,$comment,$date){

    $mysqli = connect();
    $query = "INSERT INTO feedback_visit (`PHONE_NB`, `RATE`, `COMMENT`, `FEEDBACKDATE`) VALUES (?, ?, ?,?);";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('siss',$phone,$rate,$comment,$date);
    $statement->execute();
    $statement->close(); 
}

function getTopClients(){

    $mysqli = connect();
    $query="SELECT FIRST_NAME,LAST_NAME FROM customer WHERE NB_OF_ORDER!=0 order by NB_OF_ORDER desc limit 3 ;";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($firstName,$lastName);
    while($statement->fetch()){
    ?>

        <div  class="feedback" style="height: 250px; width: 250px;padding-top:40px">
        <img  src="./images/user.png"  alt="" class="avatar" style="height: 130px;width:130px;border-radius:65px ;">
        <p  style=" margin-top: 20px;
            font-weight:bold ;
            font-size: 20px;
            text-shadow: 1px 1px #000000;"><?php echo $firstName; ?> <?php echo $lastName; ?></p> 
        </div>

    <?php
    }
    $statement->close(); 
}

function getMenuName2($item_id){
    $mysqli = connect();
    $query="SELECT * FROM MENU_ITEM WHERE ITEM_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $statement->bind_result($menu_id,$item_id);
    $menu =$statement->get_result()->fetch_all();
    $statement->close();

    $menu_id = $menu[0][0];

    $mysqli = connect();
    $query="SELECT * FROM MENU WHERE MENU_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$menu_id);
    $statement->execute();
    $statement->bind_result($menu_id,$title);
    $menu =$statement->get_result()->fetch_all();
    $statement->close();
    return $menu[0][1];
}

function getImages2($item_id){

    $mysqli = connect();
    $query="SELECT * FROM IMAGE WHERE ITEM_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$item_id);
    $statement->execute();
    $statement->bind_result($image_id,$item_id,$path);
    $images =$statement->get_result()->fetch_all();
    $statement->close();
    return $images;
}

function showItem($item_id,$name,$item_description,$item_price,$rating_avg){
    
    $menu_name = getMenuName2($item_id);
    $images = getImages2($item_id); 
    $path = $images[0][2];
    
    ?>
    
        <style>

            .box{
                width: 250px;
                
            }

            .item-link{
                color:white;
            }

            .arrow{
                color:#343a40;
                font-size: x-large;
                margin-left: 50px;
                margin-right: 50px;
            }

        </style>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">

    <div class="col-sm-4 col-lg-4 all <?php echo $menu_name ?> ">
                <div class="box">
                <div>
                    <div class="img-box">
                    <a href="item-page.php?itemId=<?php echo $item_id ?>">  <img src="./images/<?php echo $path ?>" alt="" /></a>
                    </div>
                    <div class="detail-box">

                    <center>

                    <h5>
                        <?php echo $name ?>
                    </h5>
                    <p>
                        <?php echo $item_description ?>
                    </p>

                    <p>
                    <div >
                        <span class="rating__result"></span>
                            
                            <?php   $rating = round($rating_avg);
                                    $reste = 5 - $rating;

                                    while($rating > 0){ ?>

                                        <i class=" fas fa-star" style="font-size: 1.3em; color: #FFBE33;" ></i>
                                        <?php $rating--;
                                    }
                                    while($reste > 0){ ?>

                                        <i class=" far fa-star" style="font-size: 1.3em; color: #FFBE33;" ></i>
                                        <?php $reste--;
                                    }
                            ?>

                        </div>
                    </p>

                    </center>

                    <div class="options">
                        <h5 style="margin-top: 10px;"><?php echo $item_price ?> L.L</h5>


                        <a href="rate.php?name=<?php echo $name ?>">
                            <button style=" display: inline-block;
                                            padding: 8px 30px;background-color: #ffbe33;
                                            color: #ffffff;
                                            border-radius: 45px;
                                            border: none;">
                                            Rate</button>
                        </a>

                        <a href="./addToCart?item_id=<?php echo $item_id ?>">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                            <g>
                            <g>
                                <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                            c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                            </g>
                            </g>
                            <g>
                            <g>
                                <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                            C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                            c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                            C457.728,97.71,450.56,86.958,439.296,84.91z" />
                            </g>
                            </g>
                            <g>
                            <g>
                                <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                            c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                            </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g> <g>        </g>    <g></g>
                            <g>              </g><g>
                            </g>
                            <g>
               </g>
                            <g>
                            </g>
                        </svg>
                        </a>
                    </div>
                    </div>        </div>
                </div>
    </div>

    <?php
    
}

function getTopItems(){
    
    $mysqli = connect();
    $query="SELECT * FROM item WHERE ITEM_ID != 1 order by RATING_AVG desc limit 6;";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($item_id,$name,$item_description,$item_price,$rating_avg,$date);

    while($statement->fetch()){

        showItem($item_id,$name,$item_description,$item_price,$rating_avg);
    }

    $statement->close();
}

function getCustomerName($phone){

    $mysqli = connect();
    $query = "SELECT FIRST_NAME,LAST_NAME FROM customer WHERE PHONE_NB=?;";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s',$phone);
    $statement->execute();
    $name =$statement->get_result()->fetch_all();
    $statement->close();
    $fullName = $name[0][0].' '.$name[0][1];
    return $fullName;
}

function getCustomersFeedbacks(){

    $mysqli = connect();
    $query="SELECT * FROM feedback_visit;";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($phone,$rating,$comment,$date);
    while($statement->fetch()){

        $name = getCustomerName($phone);
    ?>

        <div class="item">
            <div class="box" style="padding-bottom: 20px;">
              <div class="detail-box">
                <p style="font-size: 27px;margin: -10px 0px 10px 0px;"><?php echo $name; ?></p>
                
                <p style="padding-bottom: 10px;">
                    <?php   $reste = 5 - $rating;

                            while($rating > 0){ ?>

                                <i class=" fas fa-star" style="font-size: 1.3em; color: yellow;" ></i>
                                <?php $rating--;
                            }
                            while($reste > 0){ ?>

                                <i class=" far fa-star" style="font-size: 1.3em; color: yellow;" ></i>
                                <?php $reste--;
                            }
                    ?>
                </p>
                <p style="padding-bottom: 20px;">
                    <?php echo substr($date,0,16); ?>
                </p>
                <p style="font-size:20px;">
                    <?php echo $comment; ?>
                </p>
              </div>
              <div class="img-box">
                <img src="images/user.png" alt="" class="box-img">
              </div>
            </div>
        </div>

    <?php
    }
    $statement->close();  
}

function getFeedbackVisitAvg(){

    $mysqli = connect();
    $query = "SELECT sum(RATE)/count(RATE) FROM feedback_visit;";
    $statement = $mysqli->prepare($query);
    $statement->execute();
    $ratingAvg =$statement->get_result()->fetch_all();
    $statement->close();
    return $ratingAvg[0][0];
}

//******* END OF FEEDBACKVISIT SECTION ******//
?>