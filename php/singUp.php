<?php
session_start();
include_once "config.php";
$login = mysqli_real_escape_string($connectDB, $_POST['login']);
$password = mysqli_real_escape_string($connectDB, $_POST['password']);



if(!empty($login) && !empty($password) ){
   

    $sql = mysqli_query($connectDB, "SELECT * FROM users WHERE login = '{$login}'");
    if(mysqli_num_rows($sql) > 0){
        echo "est' takoi";
    } else{
    
    $randomID = rand(time(), 10000000);
    $insert_query = mysqli_query($connectDB, "INSERT INTO users (uniqID, login, password)
      VALUES ('{$randomID}', '{$login}','{$password}')");
      
     
        if($insert_query){
            $select_sql = mysqli_query($connectDB, "SELECT * FROM users WHERE login = '{$login}'");
            
            if(mysqli_num_rows($select_sql) > 0){
                $result = mysqli_fetch_assoc($select_sql);
                $_SESSION['uniqID'] = $result['uniqID'];
                echo "success";
            }
        }
    }
}


 ?>