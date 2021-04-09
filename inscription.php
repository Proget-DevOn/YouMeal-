<?php
include("config.php");
include('inscription.html');

function ajout_login($pseudo,$password,$email,$birthday,$nom,$prenom){

  $pwd = password_hash($password, PASSWORD_BCRYPT);

  global $conn;
  $sql = "INSERT INTO utilisateurs (pseudo,password,email,date_naissance,nom,prenom) VALUES ('".$pseudo."', '".$pwd."','".$email."','".$birthday."','".$nom."','".$prenom."')";

  return $req=$conn->query($sql);
}

if(ajout_login($_POST['pseudo'],$_POST['password'],$_POST['email'],$_POST['birthday'],$_POST['nom'],$_POST['prenom'])==true){
  header("Location:thankpage.html");
}
else{
  header("Location:thankpage.html");
}

?>