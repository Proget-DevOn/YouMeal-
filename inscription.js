window.addEventListener("DOMContentLoaded",function(){
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  let forms = document.querySelectorAll('.needs-validation');
let nom=document.querySelectorAll('.text');
let vide="";

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {


        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
})

//vérification mot de passe avant submit

document.getElementById("form").onsubmit = function(){
  pass1 = document.getElementById("password").value;
  confirmpass = document.getElementById("password2").value;

  if(pass1==confirmpass){
    
    if(pass1.length < 6){
      alert("Le mot de passe doit être supérieur à 6 caractères")
      return false;
    }

    else{
      return true;
    }
    
  }

  else{
    alert("Les mots de passe ne correspondent pas");
    return false;
  }
}