
const settings = document.getElementById("settings");
const settingsMenu = document.getElementById("settingsMenu");
const imageLoadBtn = document.getElementById("imageLoadBtn");
const settingsForm = document.getElementById('settingsForm');
const backImage = document.getElementById('backImage');
settings.addEventListener("click", settingsClick);
backImage.addEventListener("click", backImageClick);

function backImageClick(){
    settingsMenu.style.display="none";
}

function settingsClick(){
    settingsMenu.style.display="flex";
   
}




// settingsForm.onsubmit = (e)=>{
//     e.preventDefault();
// }

// function imageLoadBtnClick(){
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/image.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//               let data = xhr.response;
//               if(data === "success"){
                
//               }
//           }
//       }
//     }
//     let formData = new FormData(settingsForm);
//     xhr.send(formData);
// }