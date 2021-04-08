<?php

include("config.php");
global $conn;
$idd=$_POST['nb'];
for ($i=0; $i <$_POST['nb'] ; $i++) {
  $sql = "INSERT INTO ingredient(nom_ingredient,id_recette) VALUES ('".$_POST['id_recette']."','".$_POST['$idd']."')";
  if(  $req=$conn->query($sql)==TRUE)
    {
      $dest="ajouter_recette.html";

       echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
  }
  else{
  echo $sql;
  echo "il faut remplir tout les champs";
  include('ajouter_recette.php');
  }
}

?>
