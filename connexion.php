<?php
include("config.php");
function verrifie_login($pseudo,$password){
  global $conn;
  $sql = "SELECT * FROM utilisateurs WHERE pseudo='".$pseudo."'  AND password ='".$password."'";
  $req=$conn->query($sql);
  return 1;
}

$pseudo=$_POST['pseudo'];
$password=$_POST['password'];
if(isset($_POST['pseudo'],$_POST['password']))
{

verrifie_login($_POST['pseudo'],$_POST['password']);
  $dest="index.html";
  echo $sql;
  echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}
else {
  $dest="connexion.html";
     echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}
 ?>
