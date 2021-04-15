//vérification mot de passe avant submit

document.getElementById("form").onsubmit = function(){
    pass1 = document.getElementById("password").value;
  
    if(pass1==""){
        alert("Veuillez renseigner un mot de passe");
        return false;
    }
}