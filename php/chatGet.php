
<?php
            // $contact_id = mysqli_real_escape_string($connectDB, $_GET['contactMessage_id']);
            // $currentContactQuery = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$contact_id}'");

            // if(mysqli_num_rows($currentContactQuery) > 0){
            // $currentContact = mysqli_fetch_assoc($currentContactQuery);
            
            // }

            // $user_id = mysqli_real_escape_string($connectDB, $_GET['userMessage_id']);
            // $currentUserQuery = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$user_id}'");
            
            // if(mysqli_num_rows($currentUserQuery) > 0){
            //     $currentUser = mysqli_fetch_assoc($currentUserQuery);
                
            //     }

?>

<?php 
    session_start();
    include_once "config.php";
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_SESSION['uniqID'])){


    

    $outgoing_id = $_SESSION['uniqID'];
    $incoming_id = mysqli_real_escape_string($connectDB, $_POST['contactMessage_id']);
 
    $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.uniqID = userMessage_id
                WHERE (userMessage_id = '{$outgoing_id}' AND contactMessage_id = '{$incoming_id}')
                OR (userMessage_id = '{$incoming_id}' AND contactMessage_id = '{$outgoing_id}') ORDER BY Message_id";

        $selectUserLogin = mysqli_query($connectDB, "SELECT * FROM users WHERE 	uniqID = '{$_SESSION['uniqID']}'");
                    
        if(mysqli_num_rows($selectUserLogin) > 0){
            $currentUser = mysqli_fetch_assoc( $selectUserLogin);
        }

        $selectContactLogin = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$incoming_id}'");
                    
        if(mysqli_num_rows($selectContactLogin) > 0){
            $currentContact = mysqli_fetch_assoc( $selectContactLogin);
        }

        
        $selectUserImage = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$_SESSION['uniqID']}'");
                    
        if(mysqli_num_rows($selectUserImage) > 0){
            $currentUserImage = mysqli_fetch_assoc($selectUserImage);
        }

        $selectContactImage = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$incoming_id}'");
                    
        if(mysqli_num_rows($selectContactImage) > 0){
            $currentContactImage = mysqli_fetch_assoc($selectContactImage);
        }
        
        
        

        $query = mysqli_query($connectDB, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['userMessage_id'] === $outgoing_id){
                    $output .= '
                     <div class="containerMessageUser">
                            <div class="userMessage">

                                 <img class="userIcon" src="'.$currentUserImage['image'].'">
                                
                                <div class="messageInfo">
                                <div class="username">
                                    <label for="">'.$currentUser['login'].'</label>
                                </div>
                                    <div class="messageDec">
                                        <label for="">'.$row['message'].' </label></div>
                                </div>
                            </div>
                         </div>';
                }else{
                    $output .= '<div class="containerMessageContact">
                    <div class="contactMessage">
                       
                    <img class="userIcon" src="'.$currentContactImage['image'].'">
                        
                        <div class="messageInfo">
                           <div class="username">
                               <label for="">'. $currentContact['login'].'</label>
                           </div>
                             <div class="messageDec">
                                <label for="">'.$row['message'].'</label></div>
                        </div>
                    </div>
                </div>
                ';
                }
            }
        }else{
            $output .= '<div class="placeholderMessage">
            Стоит начать общение.
        </div>';
        }
        echo $output;
    }

?>
    
    
    
    
    
    
    
    
    
    
    
    
    
