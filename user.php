<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RTC</title>
    
    <link rel="stylesheet" href="Css/userStyle.css">
    <link rel="stylesheet" href="Css/contactStyle.css">
    <link rel="stylesheet" href="Css/chatStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Lobster&family=Press+Start+2P&family=Roboto&display=swap" rel="stylesheet">
    
</head>
<body>

<?php  //Вход по ID
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  include_once "php/config.php";
  if(!isset($_SESSION['uniqID'])){
    header("location: index.php");
  }
?>

<?php 

  

  $sql = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = {$_SESSION['uniqID']}");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }else{
    header("location: user.php");
  }




  $user_id = mysqli_real_escape_string($connectDB, $_GET['id_User']);
  $currentContactQuery = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$user_id}'");
  if(mysqli_num_rows($currentContactQuery) > 0){
    $currentContact = mysqli_fetch_assoc($currentContactQuery);
    }else{
        $user_id = $row['uniqID'];
        $currentContact['login'] = "Избранное";
        // header("location: user.php");
    }
//   $login = mysqli_real_escape_string($connectDB, $_POST['login']);
//   $currentUser = mysqli_query($connectDB,"SELECT * FROM users WHERE login='{$login}'");
//   $currentUser = mysqli_fetch_assoc($sql);


$selectUserImage = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$_SESSION['uniqID']}'");
                    
        if(mysqli_num_rows($selectUserImage) > 0){
            $currentUserImage = mysqli_fetch_assoc($selectUserImage);
        }
$selectContactImage = mysqli_query($connectDB, "SELECT * FROM users WHERE uniqID = '{$user_id}'");
            
        if(mysqli_num_rows($selectContactImage) > 0){
            $currentContactImage = mysqli_fetch_assoc($selectContactImage);
        }

?>

<div class="mainWindow">
        <div class="contactMenu"> 
            <div class="userHeader">
                <img class="userIcon" src="<?php echo $currentUserImage['image']?>">
                <label for="" style="font-weight: bold;"><?php echo $row['login']?></label>
                <button type="button" id="settings"  >Настройки <ion-icon name="settings"></ion-icon></button>
                <a href="php/logOut.php" >
                <button type="button" id="logOut">Выйти<ion-icon name="log-out"></ion-icon></button>
                </a>
        </div>

            <?php
                
   
                

               
                // Обновление картинки в базе данных
                if (isset($_SESSION['uniqID'])) {
                    $uniqID =$_SESSION['uniqID'];
                    $image = $_FILES['image']['name'];
                    $image_temp = $_FILES['image']['tmp_name'];
                    $image_folder = "images/"; // Папка, куда сохраняются изображения
                    
                    // Перемещение загруженного файла в нужную папку
                    move_uploaded_file($image_temp, $image_folder . $image);
                    
                    $relative_path = $image_folder . $image;

                    // Обновление столбца image для текущего пользователя
                    if(!empty($image) && !empty($image_temp) ){
                    $sql = "UPDATE users SET image ='$relative_path' WHERE uniqID='$uniqID'";
                
                    if (mysqli_query($connectDB, $sql)) {
                       
                        
                        
                    } else {
                         mysqli_error($connectDB);
                    }
                    $connectDB->close();
                }
            }
                ?>
            
        

            <div class="settingsMenu" id="settingsMenu">
                <label for=""> Настройки:</label>
                <button class="backImage" id="backImage"><ion-icon style="margin-left: 0vh;" name="arrow-back-circle"></ion-icon></button>   
             <form action="" id="settingsForm" enctype="multipart/form-data"  method="POST">
             <input type="hidden" name="uniqIDforImage" value="<?php $_SESSION['uniqID'] ?>">
             <input type="file" class="imageLoad" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
             <button  id="imageLoadBtn" type="submit" > Загрузить <ion-icon name="image"></ion-icon> </button>
             </form>
                
            </div>
            <header><label for="">Чаты</label></header>
            <div class="contactListBG" id="usersList">
               
               

                
            </div> 
            <!-- <div class="border"></div>
            <div class="searchBlock">
                <input id="search" type="text" value="" placeholder="Введите логин контакта">
                <button class="addContact" id="addContact">
                    Добавить
                    <ion-icon name="add-circle"></ion-icon>
                </button>
            </div> -->

    </div>

    <div class="chatWindow">
        
        <div class="contactHeader">
                <img class="userIcon" src="<?php echo $currentContactImage['image']?>">
            
                <label for="" style="font-weight: bold;"><?php echo $currentContact['login']?></label>
        </div>
            <div class="border"></div>
                <div class="contactListBG" id="chatList">

                    
               
                
                    
                        
                </div>

            <div class="border"></div>

            
            

                <form action="#"  method="POST" enctype="multipart/form-data"  class="inputMessage" id="inputMessageID">
                <button type="button" id="lastUpdate"><ion-icon style="margin-left: 0vh;" name="chevron-down-circle"></ion-icon></button>
                <input hidden type="text" name="userMessage_id" value="<?php echo $_SESSION['uniqID'];?>">
                <input hidden type="text" name="contactMessage_id" value="<?php echo $user_id;?>">
                <input  type="text"  name="message" id="sendMessage" value=""  placeholder="Написать сообщение" autocomplete="off">
                <button type="submit" id="sendButton"><ion-icon style="margin-left: 0vh;" name="send" ></ion-icon></button>
                </form>



        </div>
    </div>

</div>
    

</body>
<script type="module" src="/javaScript/settings.js"></script>
<script type="module" src="/javaScript/userPhp.js"></script>
<script type="module" src="/javaScript/UserMain.js"></script>
<script type="module" src="/javaScript/chat.js"></script>
<script type="module" src="/javaScript/UserMain.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>