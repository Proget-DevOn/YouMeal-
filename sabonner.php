<?php
include('profil.php');
 if(isset($_GET['pseudo']))
{
  $sql="SELECT pseudo FROM utilisateurs WHERE pseudo= '".$_SESSION['login']."'";
  $rep = $conn->query($sql);
  $result=$rep->fetch(PDO::FETCH_BOTH);
  $sql="SELECT pseudo_abonnement FROM abonnement WHERE pseudo_abonnement='".$_GET['pseudo']."' AND pseudo_abonne='".$result['pseudo']."'";
  $rep=$conn->query($sql);
  if($rep->fetch(PDO::FETCH_BOTH))
  {
    echo " ce style est dejà dans vos favoris";
  }
  else
  {
    $sql="INSERT INTO abonnement (pseudo_abonne,pseudo_abonnement) VALUES ('".$_GET['pseudo']."','".$result['pseudo']."')";
    $rep = $conn->query($sql);
    //$result=$rep->fetch_assoc();
    echo " ajouté :)";

}
}?>
