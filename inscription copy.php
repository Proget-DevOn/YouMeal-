<?php
include("config.php");
function ajout_login($pseudo,$password,$email,$birthday,$nom,$prenom){
  global $conn;

    if(!empty($pseudo) && !empty($password)){
      $options = ['cost' => 10];
      $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
    }
  
  $sql = "INSERT INTO utilisateurs (pseudo,password,email,date_naissance,nom,prenom) VALUES ('".$pseudo."', '".$hashpass."','".$email."','".$birthday."','".$nom."','".$prenom."')";

  

  if(  $req=$conn->query($sql))
    {
      $verif=TRUE;
  return $verif;
}
else {
  $verif=false;
  return $verif;

}
}
if(ajout_login($_POST['pseudo'],$_POST['password'],$_POST['email'],$_POST['birthday'],$_POST['nom'],$_POST['prenom'])==true)
{
$dest="connexion.html";

 echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}

else{
  echo "il faut remplir tous les champs";
  include('inscription.html');
}
?>
