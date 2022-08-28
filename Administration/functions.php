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
//******* MENU SECTION ******//

function getAllMenus(){
    $mysqli = connect();
    $query="SELECT * FROM MENU";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($id,$title);
    
    while($statement->fetch()){
      echo"
        <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"card strpied-tabled-with-hover\">
                    <div class=\"card-header\ \">
                        <h4 class=\"card-title\" style='margin:20px 0px 0px 20px;'>$title<a href=\"Edit/editMenu.php?title=$title\">       
                             <button style=\"color:white; 
                         background-color:rgb(251,188,4); 
                         border:none;
                         font-size:16px;
                         border-radius:5px;
                         padding:5px;
                         \"> <i class=\"bi bi-pencil-square\"></i></button></a></h4>
                 <a href=\"Delete/deleteMenu.php?title=$title\">       <button style=\"color:white;
                        float:right; 
                        background-color:red; 
                        border:none;padding:10px;
                        border-radius:5px;
                        margin-right:20px;\">Delete Menu &nbsp; <i class=\"bi bi-trash-fill\"></i></button></a>
                        
                      <a href=\"Add/addItem.php?id=$id\">  <button style=\"color:white;
                        float:right; 
                        background-color:green; 
                        border:none;padding:10px;
                        border-radius:5px;
                        margin-right:20px;\">Add new Item &nbsp; <i class=\"bi bi-plus-square-fill\"></i></button></a>
                         </td>
                                </tr>
                    </div>
                    <div class=\"card-body  table-responsive\">
                        <table class=\"table table-hover table-striped\">
                            <thead>
                                <th >Item ID</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th></th>
                            </thead>
                            <tbody>
    
        ";
        getSimpleListItem($id);
        echo "
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        ";
        }
    $statement->close();
    }
    
    
    
    
    // add menu 
    
    function addMenu($menu_name){
        $mysqli = connect();
        
        $query= "INSERT INTO MENU(TITLE) VALUES(?)";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("s",$menu_name);
        $stmt->execute();
        $stmt->close();
        
    }
    
    //check menu name is already exist
    
    
    function check_menu_name($menu_name){
        $mysqli = connect();
        $query= "SELECT TITLE FROM MENU WHERE TITLE = ?";
    
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("s",$menu_name);
        $stmt->execute();
        $arr =$stmt->get_result()->fetch_all();
       
        $stmt->close();
        if(count($arr)>0){
            return false;
        }
    
    return true;    
    
    }
    
    // delete menu
    
    function deleteMenu($menu_name){
    
        $mysqli = connect();
        $query="SELECT * FROM MENU WHERE TITLE = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("s",$menu_name);
        $statement->execute();
        $menu =$statement->get_result()->fetch_all();
        $statement->close();
        $menu_id = $menu[0][0];
    
        //delete items from menu_item 
    
        $mysqli = connect();
        $query= "SELECT ITEM_ID FROM MENU_ITEM WHERE MENU_ID = ?";
    
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("i",$menu_id);
        $stmt->execute();
        $arr =$stmt->get_result()->fetch_all();
        $stmt->close();
    
        //delete items from menu_item
        $mysqli=connect();
        $query="DELETE FROM MENU_ITEM WHERE MENU_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$menu_id);
        $statement->execute();
        $statement->close();
    
        //delete items
        $c = 0;
        while($c<count($arr)){
            $mysqli=connect();
            deleteItem_menu($arr[$c][0]);
            $c++;
    
        }
    
        //delete menu
    
        $mysqli=connect();
        $query="DELETE FROM MENU WHERE MENU_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$menu_id);
        $statement->execute();
        $statement->close();
    }
    
    // edit menu
    
    function editMenu($menu_name_old,$menu_name_new){
        $mysqli=connect();
        $query="UPDATE MENU SET TITLE =? WHERE TITLE=?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("ss",$menu_name_new,$menu_name_old);
        $statement->execute();
        $statement->close();
        
    }
    
    //********END OF MENU SECTION********//
    
    
    
    
    //******* ITEM SECTION ******//
    
    
    function getSimpleListItem($menu_id){
        $mysqli = connect();
        $query="SELECT * FROM MENU_ITEM,ITEM WHERE MENU_ITEM.MENU_ID = ? AND MENU_ITEM.ITEM_ID=ITEM.ITEM_ID";
        $stmt= $mysqli->prepare($query);
        $stmt->bind_param("i",$menu_id);
        $stmt->execute();
        $stmt->bind_result($menu_id,$item_id,$item_id1,$item_name,$item_descripton,$item_price,$item_rating_avg,$item_date);
        while($stmt->fetch()){
            echo "
                <tr>
                <td style=\"padding:0px 30px;\">$item_id</td>
                <td>$item_name</td>
                <td>$item_descripton</td>
                <td>$item_price</td>
                <td><a href=\"Delete/deleteItem.php?id=$item_id\"><button style=\"color:white;
                            background-color:red; 
                            border:none;padding:10px;
                            border-radius:5px;
                            margin-right:20px;\">DELETE &nbsp; <i class=\"bi bi-trash-fill\"></i></button></a>
                 <a href=\"Edit/editItem.php?id=$item_id\">       <button style=\"color:white; background-color:rgb(251,188,4); border:none;padding:10px;border-radius:5px;\">EDIT &nbsp; <i class=\"bi bi-pencil-square\"></i></button></a></td>
                 </tr>
                ";
        }
        $stmt->close();
    
    }
    
    
    function addItemInMenu($item_name,$item_descripton,$item_price,$images,$menu_id){
        
        // add item
    
        $mysqli = connect();
        $query= "INSERT INTO ITEM(NAME,ITEM_DESCRIPTION,ITEM_PRICE,DATE) VALUES(?,?,?,NOW())";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("ssi",$item_name,$item_descripton,$item_price);
        $stmt->execute();
        $item_id = $mysqli->insert_id;
        $stmt->close();
    
        // add item to menu
        $mysqli = connect();
        $query= "INSERT INTO MENU_ITEM VALUES(?,?)";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("ii",$menu_id,$item_id);
        $stmt->execute();
        $stmt->close();
    
        // add image 
        if($images[0]!=null){
        $mysqli = connect();
        $c=0;
        while($c<count($images)){
            $query= "INSERT INTO IMAGE(PATH,ITEM_ID) VALUES(?,?)";
            $stmt=$mysqli->prepare($query);
            $stmt->bind_param("si",$images[$c],$item_id);
            $stmt->execute();
            $c++;
        }
        $stmt->close();
        }
    
    
    
    }
    
    
    //check item name if is already exists
    
    function check_item_name($item_name){
        $mysqli = connect();
        $query= "SELECT NAME FROM ITEM WHERE NAME = ?";
    
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("s",$item_name);
        $stmt->execute();
        $arr =$stmt->get_result()->fetch_all();
       
        $stmt->close();
        if(count($arr)>0){
            return false;
        }
    
    return true;    
    
    }
    
    
    function  getItem($item_id){
    
        $mysqli = connect();
        $query="SELECT * FROM ITEM WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $item =$statement->get_result()->fetch_all();
        $statement->close();
        return $item;
    }
    
    
    function getItemImages_delete($item_id){
    
        $mysqli = connect();
        $query="SELECT * FROM IMAGE WHERE IMAGE.ITEM_ID = ?";
        $stmt= $mysqli->prepare($query);
        $stmt->bind_param("i",$item_id);
        $stmt->execute();
        $stmt->bind_result($image_id,$item_id,$path);
        while($stmt->fetch()){
            echo "
                <tr>
                <td><img src=\"../../images/$path\" alt=\"\" width='300px' /></td>
                </tr>
            ";
        }
        $stmt->close();
    }
    
    function editItem($item_name_old,$item_name_new,$item_descripton,$item_price,$deleted_images,$images){
            $item = getItemName($item_name_old);
            $item_id = $item[0][0];
            $mysqli=connect();
            $query="UPDATE ITEM SET NAME ='$item_name_new', ITEM_DESCRIPTION='$item_descripton',ITEM_PRICE ='$item_price'  WHERE ITEM_ID= '$item_id'";
            $statement= $mysqli->prepare($query);
            $statement->execute();
            $statement->close();
    
        //add new image
        if($images[0]!=null){
    
        $mysqli = connect();
        $c=0;
        while($c<count($images)){
            $query= "INSERT INTO IMAGE(PATH,ITEM_ID) VALUES(?,?)";
            $stmt=$mysqli->prepare($query);
            $stmt->bind_param("si",$images[$c],$item_id);
            $stmt->execute();
            $c++;
        }
        $stmt->close();
        }
        //delete selected images
        if($deleted_images!=null){
         deleteImage($deleted_images);
        }  
        
    }
    
    function  getItemName($item_name){
    
        $mysqli = connect();
        $query="SELECT * FROM ITEM WHERE NAME = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("s",$item_name);
        $statement->execute();
        $item =$statement->get_result()->fetch_all();
        $statement->close();
        return $item;
    }
    
    function deleteItem_menu($item_id){
    
        //delete item's images
    
        $mysqli=connect();
        $query="DELETE FROM IMAGE WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();
    
        // delete item from menu
    
        $mysqli=connect();
        $query="DELETE FROM MENU_ITEM WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();
    
        //delete item from feedbackItems 
            
        $mysqli=connect();
        $query="DELETE FROM feedbackitems WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();

        //delete item 
    
        $mysqli=connect();
        $query="DELETE FROM ITEM WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();
    }
    
    function deleteItem($item_name){
        $item = getItemName($item_name);
        $item_id = $item[0][0];
    
        //delete item's images
    
        $mysqli=connect();
        $query="DELETE FROM IMAGE WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();
    
        // delete item from menu
    
        $mysqli=connect();
        $query="DELETE FROM MENU_ITEM WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();
    
        //delete item from feedbackItems 
            
        $mysqli=connect();
        $query="DELETE FROM feedbackitems WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();

        //delete item 
    
        $mysqli=connect();
        $query="DELETE FROM ITEM WHERE ITEM_ID = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("i",$item_id);
        $statement->execute();
        $statement->close();
    }
    
    function getItemImages_edit($item_id){
    
        $mysqli = connect();
        $query="SELECT * FROM IMAGE WHERE IMAGE.ITEM_ID = ?";
        $stmt= $mysqli->prepare($query);
        $stmt->bind_param("i",$item_id);
        $stmt->execute();
        $stmt->bind_result($image_id,$item_id,$path);
        while($stmt->fetch()){
            echo "
            <tr><td>
            <center>
            <input type=\"checkbox\" name=\"deleted_images[]\" value=\"../assets/img/$path\" />
            <img src=\"../../images/$path\" alt=\"\" width='300px' />
            </center>
            </td></tr>
            ";
        }
        $stmt->close();
    }
    
    function getImageId($path){
        
        $mysqli = connect();
        $query="SELECT * FROM IMAGE WHERE PATH = ?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("s",$path);
        $statement->execute();
        $image =$statement->get_result()->fetch_all();
        $statement->close();
        return $image;
    
    }
    
    
    function deleteImage($deleted_images){
        
        $mysqli=connect();
        $c = 0;
        while($c<count($deleted_images)){
    
            $path = str_replace("../assets/img/","",$deleted_images[$c]);
            $image = getImageId($path);
            $image_id = $image[0][0];
            $query="DELETE FROM IMAGE WHERE IMAGE_ID = ?";
            $statement= $mysqli->prepare($query);
            $statement->bind_param("i",$image_id);
            $statement->execute();
            $c++;
        }     
       $statement->close();
    
    
    }
    //********END OF ITEM SECTION********//
    

//********* ADMIN SECTION *********//

// add admin 

function addAdmin($username,$password,$name,$tel,$is_super){
        $mysqli = connect();
        
        $query= "INSERT INTO ADMIN VALUES(?,?,?,?,?)";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("ssssi",$username,$password,$name,$tel,$is_super);
        $stmt->execute();
        $stmt->close();
        
}

//check username is already exist

function check_username($username){
    $mysqli = connect();
    $query= "SELECT ADMIN_USERNAME FROM ADMIN WHERE ADMIN_USERNAME = ?";

    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $arr =$stmt->get_result()->fetch_all();
   
    $stmt->close();
    if(count($arr)>0){
        return false;
    }

return true;    

}

function getAdmins(){
$mysqli = connect();
$query="SELECT * FROM ADMIN";
$statement= $mysqli->prepare($query);
$statement->execute();
$statement->bind_result($username,$password,$name,$tel,$is_super);
while($statement->fetch()){
    echo " <tr>
    <td>$username</td>
    <td>$password</td>
    <td>$name</td>
    <td>$tel</td>
    <td>";
    echo$is_super?"YES":"NO";
    echo"</td>
    <td><a href=\"./Delete/deleteAdmin.php?username=$username\">
    <button style=\"color:white; 
    background-color:red; 
    border:none;
    padding:10px;
    border-radius:5px
    ;margin-right:20px;\">DELETE &nbsp; <i class=\"bi bi-trash-fill\"></i></button></a>
    <a href=\"./Edit/editAdmin.php?username=$username\"><button style=\"color:white; 
    background-color:rgb(251,188,4); 
    border:none;
    padding:10px;
    border-radius:5px;\">EDIT &nbsp; <i class=\"bi bi-pencil-square\"></i></button></a></td>
    </tr>";
}
$statement->close();
  
}

// getAdmin to display his info to edit or delete  it
function  getAdmin($username){

    $mysqli = connect();
    $query="SELECT * FROM ADMIN WHERE ADMIN_USERNAME = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("s",$username);
    $statement->execute();
    $admin =$statement->get_result()->fetch_all();
    $statement->close();
    return $admin;
}

function deleteAdmin($username){
    $mysqli=connect();
    $query="DELETE FROM ADMIN WHERE ADMIN_USERNAME = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("s",$username);
    $statement->execute();
    $statement->close();
}

function editAdmin($username,$password,$name,$tel,$is_super){
    $mysqli=connect();
    $is_super = $is_super=="on"?1:0;
    $query="UPDATE ADMIN SET PASSWORD ='$password', NAME='$name',PHONE_NB ='$tel',IS_SUPER =$is_super  WHERE ADMIN_USERNAME= '$username'";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->close();
    
}
//********* END OF ADMIN SECTION*********//



//******* TABLE SECTION ******//

function addTable($table_id,$nb_of_chairs){
        $a=0;
        $mysqli = connect();
        $query= "INSERT INTO TABLES VALUES(?,?,?)";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("iii",$table_id,$a,$nb_of_chairs);
        $stmt->execute();
        $stmt->close();
}

function  getTables(){
    $mysqli = connect();
$query="SELECT * FROM TABLES";
$statement= $mysqli->prepare($query);
$statement->execute();
$statement->bind_result($table_id,$is_free,$nb_of_chairs);
while($statement->fetch()){
    echo " <tr>
    <td style=\"font-size:18px;padding-left:100px;\">$table_id</td>
    <td style=\"font-size:18px;padding-left:80px;\">$nb_of_chairs</td><td style=\"font-size:18px;padding-left:25px;\">";
    echo $is_free ==1 ?"YES":"&nbsp;NO";
    echo "</td>
    
    <td style=\"text-align:right;\"><a href=\"./Delete/deleteTable.php?id=$table_id\">
    <button style=\"color:white; 
    background-color:red; 
    border:none;
    padding:10px;
    border-radius:5px
    ;\">DELETE &nbsp; <i class=\"bi bi-trash-fill\"></i></button></a>
    <a href=\"./Edit/editTable.php?id=$table_id\"><button style=\"color:white; 
    background-color:rgb(251,188,4); 
    border:none;
    padding:10px;
    margin-right:-110px;
    border-radius:5px;\">EDIT &nbsp; <i class=\"bi bi-pencil-square\"></i></button></a></td>
    </tr>";
}
$statement->close();
}

function editTable($id ,$free, $nb_of_chairs){
    $mysqli=connect();
    
    $query="UPDATE TABLES SET IS_FREE =? , NB_CHAIRS =?  WHERE TABLES_ID=?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("iii",$free,$nb_of_chairs,$id);
    $statement->execute();
    $statement->close();
}

function   getTable($id){
    $mysqli= connect();
    $query = "SELECT * FROM TABLES WHERE TABLES_ID =?";
    
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $table  =  $statement->get_result()->fetch_all();
    $statement->close();
    return $table;
}

function deleteTable($id){
    $mysqli=connect();
    $query="DELETE FROM TABLES WHERE TABLES_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $statement->close();

}
//********END OF TABLE SECTION********//


//******* EVENT SECTION ******//

function addEvent($imagePath,$eventName,$eventDescription,$eventDate){
    
    $mysqli = connect();
    $query= "INSERT INTO EVENT(IMAGE_Path,NAME,DESCRIPTION,Date) VALUES(?,?,?,?)";

    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("ssss",$imagePath,$eventName,$eventDescription,$eventDate);
    $stmt->execute();
    $stmt->close();
}

function  getEvents(){

    $mysqli = connect();
    $query="SELECT * FROM EVENT";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($eventId,$imagePath,$eventName,$eventDescription,$eventDate);
    while($statement->fetch()){
    
    ?>

        <tr>
            <td style="padding:0px 35px;"><?php echo $eventId; ?></td>
            <td style="width:100px;"><?php echo $eventName; ?></td>
            <td><?php echo $eventDescription; ?></td>
            <td><?php echo $eventDate; ?></td>
            <td><a href="./Delete/deleteEvent.php?id=<?php echo $eventId; ?>"><button style="color:white; background-color:red; border:none;padding:10px;border-radius:5px;margin-right:20px;">DELETE &nbsp; <i class="bi bi-trash-fill"></i></button></a>
            <a href="./Edit/editEvent.php?id=<?php echo $eventId; ?>"><button style="color:white; background-color:rgb(251,188,4); border:none;padding:10px;border-radius:5px;">EDIT &nbsp; <i class="bi bi-pencil-square"></i></button></a></td>
        </tr>

    <?php
    }
    $statement->close();
}

function editEvent($id, $imagePath, $eventName, $eventDescription, $eventDate){

    $mysqli=connect();
    if($imagePath == ""){
        $query="UPDATE `restaurantdb`.`event` SET `NAME` = ?, `DESCRIPTION` = ?, `Date` = ? WHERE (`EVENT_ID` = ?);";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("sssi",$eventName, $eventDescription, $eventDate,$id);
    }
    else{
        $query="UPDATE `restaurantdb`.`event` SET `IMAGE_Path` = ?, `NAME` = ?, `DESCRIPTION` = ?, `Date` = ? WHERE (`EVENT_ID` = ?);";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("ssssi",$imagePath, $eventName, $eventDescription, $eventDate,$id);
    }
    $statement->execute();
    $statement->close();
}

function getEvent($id){

    $mysqli= connect();
    $query = "SELECT * FROM EVENT WHERE EVENT_ID =?";

    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $event  =  $statement->get_result()->fetch_all();
    $statement->close();
    return $event;
}

function deleteEvent($id){

    $mysqli=connect();
    $query="DELETE FROM EVENT WHERE EVENT_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $statement->close();
}

//********END OF EVENT SECTION********//


//******* OFFER SECTION ******//

function addOffer($offerName,$offerPrice,$offerDescription,$imagePath,$items){
    
    $mysqli = connect();
    $query= "INSERT INTO offer(OFFER_NAME,PRICE,OFFER_DESCRIPTION,IMAGE_Path) VALUES(?,?,?,?);";

    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("siss",$offerName,$offerPrice,$offerDescription,$imagePath);
    $stmt->execute();
    $stmt->close();

    $query= "SELECT MAX(OFFER_ID) FROM offer;";

    $stmt=$mysqli->prepare($query);
    $stmt->execute();
    $offerID  =  $stmt->get_result()->fetch_all();
    $stmt->close();

    foreach($items as $k=>$v){
        
        $query= "INSERT INTO item_offer VALUES(?,?);";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("ii",$offerID[0][0],$v);
        $stmt->execute();
        $stmt->close();
    }
}

function getItemsDetails($itemId){

    $mysqli = connect();
    $query="SELECT ITEM_ID, NAME, ITEM_DESCRIPTION, ITEM_PRICE FROM item WHERE ITEM_ID=?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$itemId);
    $statement->execute();
    $item  =  $statement->get_result()->fetch_all();
    ?>
        <tr>
            <td style="padding:0px 30px;"><?php echo $item[0][0]; ?></td>
            <td><?php echo $item[0][1]; ?></td>
            <td><?php echo $item[0][2]; ?></td>
            <td><?php echo $item[0][3]; ?></td>
        </tr>
    <?php
}

function getItemsOffer($offerId){

    $mysqli = connect();
    $query="SELECT ITEM_ID FROM item_offer WHERE OFFER_ID=".$offerId;
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($itemId);
    while($statement->fetch()){
        
        getItemsDetails($itemId);
    }
}

function  getOffers(){

    $mysqli = connect();
    $query="SELECT OFFER_ID, OFFER_NAME, OFFER_DESCRIPTION, PRICE FROM offer WHERE OFFER_ID != 1";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($offerId,$offerName,$offerDescription,$offerPrice);
    while($statement->fetch()){
    
    ?>

        <div class="card strpied-tabled-with-hover">

        <div class="card-header ">

            <h4 class="card-title" style="margin-top: 10px;">&nbsp;<?php echo $offerName; ?> &nbsp;&nbsp;
                <a href="Edit/editOffer.php?id=<?php echo $offerId; ?>">       
                    <button style="color:white; 
                                    background-color:rgb(251,188,4); 
                                    border:none;
                                    font-size:16px;
                                    border-radius:5px;
                                    padding:5px;">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </a>

                <a href="Delete/deleteOffer.php?id=<?php echo $offerId; ?>">
                    <button style=" color:white;
                                    float:right; 
                                    background-color:red; 
                                    border:none;padding:10px;
                                    border-radius:5px;
                                    font-size:17px;
                                    margin-bottom:15px;
                                    margin-right:20px;">Delete Offer &nbsp;
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </a>
            </h4>
        </div>

        <div class="card-body  table-responsive">
            <table class="table table-hover table-striped " style="width: 93.8%;margin-bottom:50px;text-align: center;">
                <tr>
                    <td colspan="1">Price</td>
                    <td colspan="4"><?php echo $offerPrice." "; ?>LL</td>
                </tr>  
                <tr>
                    <td colspan="1">Description</td>
                    <td colspan="4"><?php echo $offerDescription; ?></td>
                </tr>
            </table>
            
            <table class="table table-hover table-striped" >
                <thead>
                    <th >Item ID</th>
                    <th >Item Name</th>
                    <th >Description</th>
                    <th >Price</th>
                    <th></th>
                </thead>

                <tbody>

                    <?php
                        getItemsOffer($offerId);
                    ?>
                </tbody>
            </table>
        </div>
        </div>

    <?php
    }
    $statement->close();
}

function  getOffersItems(){

    $mysqli = connect();
    $query="SELECT ITEM_ID, NAME, ITEM_DESCRIPTION, ITEM_PRICE FROM item WHERE ITEM_ID != 1";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($ITEM_ID,$NAME,$ITEM_DESCRIPTION,$ITEM_PRICE);
    while($statement->fetch()){
    
    ?>

        <tr>
            <td><?php echo $ITEM_ID; ?></td>
            <td><?php echo $NAME; ?></td>
            <td><?php echo $ITEM_DESCRIPTION; ?></td>
            <td><?php echo $ITEM_PRICE; ?></td>

            <td><input type="checkbox" name="selected[]" value="<?php echo $ITEM_ID; ?>"></td>

        </tr>

    <?php
    }
    $statement->close();
}

function checkItemSelected($offerID,$ITEM_ID){

    $mysqli = connect();
    $query="SELECT * FROM item_offer WHERE ITEM_ID =".$ITEM_ID." AND OFFER_ID =".$offerID;
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($resultA,$resultB);
    if($statement->fetch())
            return true;
    return false;
}

function  getOffersItemsEdit($offerID){

    $mysqli = connect();
    $query="SELECT ITEM_ID, NAME, ITEM_DESCRIPTION, ITEM_PRICE FROM item";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($ITEM_ID,$NAME,$ITEM_DESCRIPTION,$ITEM_PRICE);
    while($statement->fetch()){
    
    ?>

        <tr>
            <td><?php echo $ITEM_ID; ?></td>
            <td><?php echo $NAME; ?></td>
            <td><?php echo $ITEM_DESCRIPTION; ?></td>
            <td><?php echo $ITEM_PRICE; ?></td>

            <td><input type="checkbox" name="selected[]" value="<?php echo $ITEM_ID; ?>" <?php echo checkItemSelected($offerID,$ITEM_ID)?"checked":"";?>></td>

        </tr>

    <?php
    }
    $statement->close();
}

function updateItems($offerID,$items){

    $mysqli=connect();

    $query="DELETE FROM item_offer WHERE OFFER_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$offerID);
    $statement->execute();
    $statement->close();

    foreach($items as $k=>$v){
        
        $query= "INSERT INTO item_offer VALUES(?,?);";
        $stmt=$mysqli->prepare($query);
        $stmt->bind_param("ii",$offerID,$v);
        $stmt->execute();
        $stmt->close();
    }
}

function editOffer($offerID,$offerName,$offerPrice,$offerDescription,$imagePath,$items){

    $mysqli=connect();
    if($imagePath == ""){
        $query="UPDATE offer SET OFFER_NAME =?, OFFER_DESCRIPTION =?, PRICE =? WHERE OFFER_ID =?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("ssii",$offerName, $offerDescription, $offerPrice,$offerID);
    }
    else{
        $query="UPDATE offer SET OFFER_NAME =?, IMAGE_Path =?, OFFER_DESCRIPTION =?, PRICE =? WHERE OFFER_ID =?";
        $statement= $mysqli->prepare($query);
        $statement->bind_param("sssii",$offerName, $imagePath, $offerDescription, $offerPrice,$offerID);
    }
    updateItems($offerID,$items);
    $statement->execute();
    $statement->close();
}

function getOffer($id){

    $mysqli= connect();
    $query = "SELECT * FROM offer WHERE OFFER_ID =?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $offer  =  $statement->get_result()->fetch_all();
    $statement->close();
    return $offer;
}

function deleteOffer($id){

    $mysqli=connect();

    $query="DELETE FROM item_offer WHERE OFFER_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $statement->close();

    $query="DELETE FROM offer WHERE OFFER_ID = ?";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("i",$id);
    $statement->execute();
    $statement->close();
}

//********END OF OFFER SECTION********//


//******* ABOUT SECTION ******//

function getAboutInfo(){

    $mysqli= connect();
    $query = "SELECT * FROM about";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $about  =  $statement->get_result()->fetch_all();
    if(count($about)>0){
    ?>

    <tr>
        <td style="width: 30%;font-size: 20px;color:#555555;font-weight:bold;">Description</td>
        <td></td>
        <td ><?php echo $about[0][0]; ?></td>
    </tr>
    <tr>
        <td style="font-size: 20px;color:#555555;font-weight:bold;">Phone Number</td>
        <td></td>
        <td ><?php echo $about[0][1]; ?></td>
    </tr>
    <tr>
        <td style="font-size: 20px;color:#555555;font-weight:bold;">Address</td>
        <td></td>
        <td ><?php echo $about[0][2]; ?></td>
    </tr> 
    <tr>
        <td style="font-size: 20px;color:#555555;font-weight:bold;">Open Time</td>
        <td></td>
        <td ><?php echo substr($about[0][3],0,5); ?></td>
    </tr>
    <tr>
        <td style="font-size: 20px;color:#555555;font-weight:bold;">Close Time</td>
        <td></td>
        <td ><?php echo substr($about[0][4],0,5); ?></td>
    </tr> 

    <?php
    }
    $statement->close();
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

function editAbout($description,$phone,$adress,$opentime,$closetime){

    $mysqli= connect();

    $query = "DELETE FROM about";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->close();

    $query= "INSERT INTO about VALUES(?,?,?,?,?);";

    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("sssss",$description,$phone,$adress,$opentime,$closetime);
    $stmt->execute();
    $stmt->close();
}

//********END OF ABOUT SECTION********//


//******* RESERVATIONS SECTION ******//

function reserveTable($name,$phone,$guestNbr,$dateBefore,$date,$dateAfter){

    $now = new DateTime();
    $d = new DateTime($date);

    if($d < $now) return false;

    $mysqli= connect();

    $query = "SELECT TABLES_ID,NB_CHAIRS FROM tables WHERE TABLES_ID NOT IN ( SELECT TABLES_ID FROM reservation where RESERVATIONDATE between ? and ?) AND NB_CHAIRS >= ? order by NB_CHAIRS;";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("ssi",$dateBefore,$dateAfter,$guestNbr);
    $statement->execute();
    $result  =  $statement->get_result()->fetch_all();

    if(empty($result)) return false;

    $tableID = $result[0][0];
    $statement->close();

    $query= "INSERT INTO reservation VALUES(?,?,?,?,?);";
    $stmt=$mysqli->prepare($query);
    $stmt->bind_param("ssiis",$phone,$name,$tableID,$guestNbr,$date);
    $stmt->execute();
    $stmt->close();
    return true;
}

function  getReservations(){

    $mysqli = connect();
    $query="SELECT * FROM reservation";
    $statement= $mysqli->prepare($query);
    $statement->execute();
    $statement->bind_result($phone,$name,$tableID,$guests,$date);
    while($statement->fetch()){
    
    ?>

        <tr>
            <td style="font-size:18px;padding-left:25px;"><?php echo $name; ?></td>
            <td style="font-size:18px;"><?php echo $phone; ?></td>
            <td style="font-size:18px;padding-left:40px;"><?php echo $tableID; ?></td>
            <td style="font-size:18px;padding-left:40px;"><?php echo $guests; ?></td>
            <td style="font-size:18px;"><?php echo $date; ?></td>
            <td><a href="./Delete/deleteReservation.php?id=<?php echo $tableID; ?>&phone=<?php echo $phone; ?>"><button style="color:white; background-color:red; border:none;padding:10px;border-radius:5px;margin-right:20px;">DELETE &nbsp; <i class="bi bi-trash-fill"></i></button></a></td>
        </tr>

    <?php
    }
    $statement->close();
}

function getReservation($tableID,$phone){

    $mysqli= connect();
    $query = "SELECT * FROM reservation WHERE TABLES_ID = ? AND PHONE = ?;";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("is",$tableID,$phone);
    $statement->execute();
    $reservation  =  $statement->get_result()->fetch_all();
    $statement->close();
    return $reservation;
}

function deleteReservation($tableID,$phone){

    $mysqli=connect();
    $query="DELETE FROM reservation WHERE TABLES_ID = ? AND PHONE = ?;";
    $statement= $mysqli->prepare($query);
    $statement->bind_param("is",$tableID,$phone);
    $statement->execute();
    $statement->close();
}

//*******END OF RESERVATIONS SECTION ******//
?>