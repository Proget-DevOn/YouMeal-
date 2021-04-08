document.getElementById("buttonconnect").addEventListener("click", myFunction);

function myFunction() {
    var password = document.getElementById("password").value;
    if(password==""){
        alert("Veuillez renseigner un mot de passe");
    }
}