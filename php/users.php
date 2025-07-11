<?php
    session_start();
    include_once "config.php";
    error_reporting(E_ERROR | E_PARSE);
    
    $outgoing_id = $_SESSION['uniqID'];
    $sql = "SELECT * FROM users WHERE NOT uniqID = {$outgoing_id} ORDER BY id_User DESC";
    
    $output = "";
    $query = mysqli_query($connectDB, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
    
    

    $sql2 = "SELECT * FROM messages WHERE (contactMessage_id = '{$row['uniqID']}'
                OR userMessage_id = '{$row['uniqID']}') AND (userMessage_id = '{$outgoing_id}' 
                OR contactMessage_id = '{$outgoing_id}') ORDER BY message_id DESC LIMIT 1";
    $query2 = mysqli_query($connectDB, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
        if (mysqli_num_rows($query2) > 0){ 
            $result = $row2['message'];
        }else{ $result ="";
        }
        if(strlen($result) > 28) {
            $msg =  substr($result, 0, 28) . '...' ;
        }else{
            $msg = $result;
        }

        
  
      $output .= '
      <a href="user.php?id_User='.$row['uniqID'].'">
            <div class="contact">                   
                        <img class="userIcon" src="'.$row['image'].'">
                        <div class="contactInfo">
                           <div class="username">
                           <label for="">'.$row['login'].'</label>
                           </div>
                           <div class="contactLastMessage">
                                <label for="">'.$msg .'</label></div>
                        </div>
                    
                </div>';
   } }
    echo $output;
?>