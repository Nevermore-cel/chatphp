<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Lobster&family=Press+Start+2P&family=Roboto&display=swap" rel="stylesheet">
    
   
    <title>RTC</title>
</head>
<body>

<?php  //Вход по ID
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  include_once "php/config.php";
  if(isset($_SESSION['uniqID'])){
    header("location: user.php");
  }
?>
    <div class="wrapper" >
        
        <section class="form singnup" id="registrationWindow">
            <header align="center" >RTC </header>
            <form action="#" method="POST" enctype="multipart/form-data" id="registrationForm">
                <div class="errorMessage" id="errorMessage">
                    <label for="">Неверный логин или пароль!</label>
                </div>
                <div class="errorMessage" id="errorMessageCoincidence">
                    <label for="">Такой логин уже существует!</label>
                </div>
                <div class="errorMessage" id="errorMessageEmptyField">
                    <label for="">Все поля должны быть заполнены</label>
                </div>

                <div class="field">
                    <div class="nameField">
                    <label for="">Логин:</label>  
                    <ion-icon name="person"></ion-icon>
                    </div>
                    <input type="login" name="login" id="loginContrast" placeholder="Введите логин" required minlength="4" >
                </div>
                <div class="field" >
                    <div class="nameField">
                    <label for="">Пароль:</label>
                    <ion-icon name="lock-closed"></ion-icon>
                    </div>
                    <input type="password" name="password" id="passwordContrast" placeholder="Введите пароль" required minlength="6">
                </div>
                <div class="field" id="repeatPassword">
                    <div class="nameField">
                    <label for="">Повторите пароль:</label>
                    <ion-icon name="lock-closed"></ion-icon>
                    </div>
                    <input type="password" id="passwordRepeatContrast" placeholder="Введите пароль ещё раз" required minlength="6">
                </div>
                <div class="buttonsSingup">
                    <button name="registerSumbit" type="sumbit" id="registerButton">  Зарегистрироваться <ion-icon name="person-add"></ion-icon>  </button>
                    <button type="button" id="backRegisterButton"> <ion-icon name="arrow-back-circle"></ion-icon>  Назад  </button>
                </div>
                <div class="buttonsSingup">
                    <button type="sumbit" id="loginButton">  Войти <ion-icon name="log-in"></ion-icon></ion-icon> </button>
                    <button type="button" id="registrationButton">  Регистрация <ion-icon name="person-add"></ion-icon>  </button>
                </div>
         </form>
        </section>
     </div>
     
    
</body>
<script src="javaScript/logIn.js"></script>
<script src="javaScript/singUp.js"></script>
<script src="javaScript/main.js"></script>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>
