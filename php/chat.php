<?php 
    session_start();
    if(isset($_SESSION['uniqID'])){
        include_once "config.php";
        $userMessageID = mysqli_real_escape_string($connectDB, $_POST['userMessage_id']);;
        $contactMessageID = mysqli_real_escape_string($connectDB, $_POST['contactMessage_id']);
        $message = mysqli_real_escape_string($connectDB, $_POST['message']);
        
        if(!empty($message)){
            $sql = mysqli_query($connectDB, "INSERT INTO messages (contactMessage_id, userMessage_id, message)
                                        VALUES ({$contactMessageID}, {$userMessageID}, '{$message}')") or die();
        }
    }else{
        header("location: ../index.php");
    }

    
    ?>

    