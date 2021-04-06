<?php
include("config.php");

function verrifie_login($pseudo,$password){
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
verrifie_login($pseudo,$password);
if(verrifie_login($pseudo,$password)==true)
  {
    if (!session_id())
    {
      session_start();
     $_SESSION['login'] = $pseudo;

     $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous êtes connecté';
     $dest="index.php";
     echo $message;
      echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
     exit;
    }
  }

else
{
  echo "il faut remplir tout les champs";
include('connexion.html');


}
 ?>
