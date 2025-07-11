const form = document.getElementById("inputMessageID");
var sendMessage = document.getElementById("sendMessage");
const sendButton= document.getElementById("sendButton");
sendButton.addEventListener("click", sendButtonClick);

form.onsubmit = (e)=>{
    e.preventDefault();
}

function sendButtonClick(){
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/chat.php", true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                sendMessage.value = "";
                var elem = document.getElementById('chatList');
                elem.scrollTop = elem.scrollHeight;
              } 
          }
        }
        let formData = new FormData(form);
        xhr.send(formData);
}






setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/chatGet.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatList.innerHTML = data;
                        
                    
           
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
  }, 500);