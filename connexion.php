<?php
include("config.php");
include('connexion.html');

function verifie_login($pseudo,$password){
  $verif=false;
  global $conn;
  $sql = "SELECT * FROM utilisateurs WHERE pseudo='".$pseudo."'  AND password ='".$password."'";
  $req=$conn->query($sql);
  $req->execute();
  if($result = $req->fetch(PDO::FETCH_ASSOC))
    {
      $verif=TRUE;
  return $verif;
}
else {
  $verif=false;
  return $verif;
}

}
$pseudo=$_POST['pseudo'];
$password=$_POST['password'];
$result=false;
verifie_login($pseudo,$password);
if(verifie_login($pseudo,$password)==true){
    if (!session_id()){
      session_start();
     $_SESSION['login'] = $pseudo;

     $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous êtes connecté';
     $dest="index.php";
     echo $message;
      echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
     exit;
    }
  }

else{
  echo '<script language="javascript">';
  echo 'document.getElementById("buttonconnect").addEventListener("click", myFunction);';
  echo 'function myFunction() {';
  echo 'var password = document.getElementById("password").value;';
  echo 'if(password==""){alert("Veuillez renseigner un mot de passe");}}';
  echo '</script>';
}
 ?>
