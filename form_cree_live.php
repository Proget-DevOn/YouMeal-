<?php

include("config.php");
global $conn;
$id_recette=$_POST['id_recette'];
$date_live=$_POST['date_live'];
$statut=$_POST['statut'];
$hote=$_POST['hote'];
  $sql = "INSERT INTO live(date_live,ID_recette,hote,statut) VALUES ('".$date_live."','".$id_recette."','".$hote."','".$statut."')";
  if(  $req=$conn->query($sql)==TRUE)
    {

        $dest="liste_live.php";
       echo '<script language="JavaScript">window.location=\'' . $dest.'\'</script>';

}
else{
  echo $sql;
  echo "il faut remplir tout les champs";
include('cree_live.php');
}
?>
