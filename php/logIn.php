<?php 

session_start();
include_once "config.php";
$login = mysqli_real_escape_string($connectDB, $_POST['login']);
$password = mysqli_real_escape_string($connectDB, $_POST['password']);

if(!empty($login) && !empty($password) ){

    $select_query = mysqli_query($connectDB,"SELECT * FROM users WHERE login='{$login}'AND password ='{$password}'");
    if(mysqli_num_rows($select_query)>0){
        $result = mysqli_fetch_assoc($select_query);
        $_SESSION['uniqID'] = $result['uniqID'];
        echo "success";
    }

} 

?>