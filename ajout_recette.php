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
      $sql2="SELECT * FROM recettes WHERE nom_recette='".$nom_recette."'  and  temps_execution='".$temps_execution."' and cout='".$cout."' and auteur='".$auteur."' and categorie='".$categorie."' and regime='".$regime."'";
      $req2=$conn->query($sql2);
      echo $sql2;
      if ($donnees=$req2->fetch(PDO::FETCH_ASSOC)){
        //echo $donnees["id_recette"];
        $dest="ajout_ingredient.php?id_recette=".$donnees["id_recette"]."";



       echo '<script language="JavaScript">window.location=\'' . $dest.'\'</script>';
     }
}
else{
  echo $sql;
  echo "il faut remplir tout les champs";
include('ajouter_recette.php');
}
?>
