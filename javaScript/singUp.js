
const form = document.getElementById("registrationForm");
const registerButton = document.getElementById("registerButton");
registerButton.addEventListener("click", registerButtonClick);

// const form = document.querySelector(".singnup form"),
// registerButton = form.querySelector(".buttonSingup button");

form.onsubmit = (e)=>{
    e.preventDefault();
}

//AJAX
function registerButtonClick() {
    let xmlreq = new XMLHttpRequest();

    xmlreq.open("POST","php/singUp.php", true);
    xmlreq.onload = () => {

        if(xmlreq.readyState === XMLHttpRequest.DONE){
            if(xmlreq.status === 200){
                let registrationData = xmlreq.response;
                if(registrationData === "success" ){
                    location.href="user.php";
                   
                    transition();

                    
                }else{
                    errorMessageEmptyField.style.display="inline-block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xmlreq.send(formData);

}

function transition(){
    errorMessageCoincidence.style.display="none";
    errorMessageEmptyField.style.display="none";
    repeatPassword.style.display="none";
    registrationButton.style.display="flex";
    backRegisterButton.style.display="none";
    registerButton.style.display="none";
    loginButton.style.display="flex";
    passwordRepeatContrast.value = '';
    passwordContrast.value='';
    loginContrast.value='';
}