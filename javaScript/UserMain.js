

var lastUpdate = document.getElementById('lastUpdate');
var elem = document.getElementById('chatList');
lastUpdate.addEventListener("click", lastUpdateClick);
function lastUpdateClick(){
   
    elem.scrollTop = elem.scrollHeight;
}

const scrollW = setInterval(function() {
    let flag = true
    elem.scrollTop = elem.scrollHeight;
    flag = false
    if (flag== false){
    clearInterval(scrollW);
    }
  }, 1000);
  
  


