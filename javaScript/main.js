
var registrationButton = document.getElementById("registrationButton");
registrationButton.addEventListener("click", registrationButtonClick);

var loginContrast = document.getElementById("loginContrast");

document.getElementById("loginContrast").oninput = loginContrastOninput;

var errorMessage = document.getElementById("errorMessage");

var passwordContrast = document.getElementById("passwordContrast");

document.getElementById("passwordContrast").oninput = passwordContrastOninput;

var passwordRepeatContrast = document.getElementById("passwordRepeatContrast");

document.getElementById("passwordRepeatContrast").oninput = passwordRepeatContrastOninput;

var repeatPassword = document.getElementById("repeatPassword");

var errorMessageEmptyFieldLogIn = document.getElementById("errorMessageEmptyFieldLogIn");

var loginWindow = document.getElementById('loginWindow');

var registrationWindow = document.getElementById('registrationWindow');

var errorMessageCoincidence = document.getElementById("errorMessageCoincidence");

var errorMessageEmptyField = document.getElementById("errorMessageEmptyField");

var backRegisterButton = document.getElementById("backRegisterButton");
backRegisterButton.addEventListener("click", backRegisterButtonClick);

// var registerButton = document.getElementById("registerButton");
//registerButton.addEventListener("click", registerButtonClick);

function registerButtonClick() {
    errorMessageDifferent.style.display="inline-block";
    errorMessageCoincidence.style.display="inline-block";
    
    
}

function backRegisterButtonClick () {
    errorMessageCoincidence.style.display="none";
    errorMessageEmptyField.style.display="none";
    repeatPassword.style.display="none";
    registrationButton.style.display="flex";
    backRegisterButton.style.display="none";
    registerButton.style.display="none";
    loginButton.style.display="flex";
    passwordRepeatContrast.value = '';
}

function registrationButtonClick () {
    errorMessage.style.display="none";
    errorMessageEmptyField.style.display="none";
    repeatPassword.style.display="inline-block";
    registrationButton.style.display="none";
    backRegisterButton.style.display="flex";
    registerButton.style.display="flex";
    loginButton.style.display="none";
    

    
}

function loginContrastOninput(){
    if(loginContrast.value !== passwordContrast.value == passwordRepeatContrast.value ){
        registerButton.disabled=true;
        
    }else{
        registerButton.disabled=false;
       
    }
}

function passwordContrastOninput(){
    if(passwordContrast.value !== passwordRepeatContrast.value){
        registerButton.disabled=true;
    }else{
        registerButton.disabled=false;
       
    }
}

function passwordRepeatContrastOninput (){
if(passwordContrast.value !== passwordRepeatContrast.value){
    registerButton.disabled=true;
}else{
    registerButton.disabled=false;

}
}


// function loginClick(){
//     errorMessage.style.display="inline-block";
// }



