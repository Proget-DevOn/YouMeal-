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
      $sql="SELECT id_recette FROM recettes WHERE nom_recette=$nom_recette and temps_execution=$temps_execution,cout=$cout,auteur=$auteur,categorie=$categorie,regime=$regime ";
      $req=$conn->query($sql);
      $donnees = $rep->fetch(PDO::FETCH_ASSOC);
      $dest="ajout_ingredients.php?id_recette="+$donnes["id_recette"];

       echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
}
else{
  echo $sql;
  echo "il faut remplir tout les champs";
include('ajouter_recette.php');
}
?>
