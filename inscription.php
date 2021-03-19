<?php
include("config.php");
function ajout_login($pseudo,$password,$email,$birthday,$nom,$prenom){
  global $conn;
  $sql = "INSERT INTO utilisateurs (pseudo,password,email,date_naissance,nom,prenom) VALUES ('".$pseudo."', '".$password."','".$email."','".$birthday."','".$nom."','".$prenom."')";
  $req=$conn->query($sql);
  return 1;

}
if(isset($_POST['pseudo'],$_POST['password'],$_POST['email'],$_POST['birthday'],$_POST['nom'],$_POST['prenom']))
{

ajout_login($_POST['pseudo'],$_POST['password'],$_POST['email'],$_POST['birthday'],$_POST['nom'],$_POST['prenom']);
$dest="connexion.html";

 echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}
else{
  $dest="inscription.html";
  echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}
?>
