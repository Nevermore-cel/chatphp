// const searchBar = document.getElementById("search");
// const addContact = document.getElementById("addContact");
// addContact.addEventListener("click", addContactClick);

// function addContactClick(){

// }



setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
              usersList.innerHTML = data;
          }
      }
    }
    xhr.send();
  }, 500);