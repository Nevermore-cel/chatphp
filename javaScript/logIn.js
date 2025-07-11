const formLogIn = document.getElementById("registrationForm");
const loginButton = document.getElementById("loginButton");
loginButton.addEventListener("click", loginButtonClick);


formLogIn.onsubmit = (e)=>{
    e.preventDefault();
}

// //AJAX

    function loginButtonClick() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/logIn.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "user.php";
                
              }else{
                errorMessageEmptyField.style.display="inline-block";
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}