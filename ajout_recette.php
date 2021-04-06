<?php

include("config.php");
global $conn;
$nom_recette=$_POST['nom_recette'];
$temps_execution=$_POST['temps_execution'];
$cout=$_POST['cout'];
$categorie=$_POST['categorie'];
$regime=$_POST['regime'];
$auteur=$_POST['auteur'];
  $sql = "INSERT INTO recettes(nom_recette,date_recette,temps_execution,cout,note,auteur,categorie,regime,image) VALUES ('".$nom_recette."',NOW(),'".$temps_execution."','".$cout."',null,'".$auteur."','".$categorie."','".$regime."','".$_POST['image']."')";
  if(  $req=$conn->query($sql)==TRUE)
    {
      $dest="affiche_recette.html";

       echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}
else{
  echo "il faut remplir tout les champs";
include('index.php');
}
?>
