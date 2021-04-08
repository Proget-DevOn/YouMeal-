<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script scr="inscription.js"></script>
    <title>YouMeal</title>
  </head>

<?php
session_start();

if(!isset($_SESSION['login']))
{

  include('connexion.html');
  die('');

}?>
<p><a href="ajouter_recette.php">ajouter une recette</a></p>
<form  method="GET" action="">
  <input type="text" name="recherche" placeholder="recherche"><input type="submit" value="chercher">
</form><?php
include('config.php');
global $conn;
if(isset($_GET['recherche']))
{
  $sql="SELECT * from recettes WHERE
  nom_recette LIKE '%".$_GET['recherche']."%'
  OR auteur LIKE '%".$_GET['recherche']."%'
  OR  regime like '%".$_GET['recherche']."%'
  OR categorie like '%".$_GET['recherche']."%'";
  $rep = $conn->query($sql);
  while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
  {
    ?>
    <div class="row">
  <div class="col-sm-2">
    <h3><?php echo $donnees['nom_recette'];?></h3>
    <a href="image/image_recettes/<?php  echo $donnees['image']; ?>"><img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
    <p><a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>">ajouter par <?php  echo $donnees['auteur'];?></a></p>
    <p><?php echo $donnees['cout']; ?> <br/>Temps de realisation:<?php  echo $donnees['temps_execution']; ?></p>
  </div>
  <?php
 }
?>
</div>
<?php
}
else {
?>
Bonjour
<?php
echo htmlspecialchars($_SESSION['login']);
$sql='SELECT * FROM recettes';
$rep = $conn->query($sql);
while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
{

?>

<div class="row">
<div class="col-sm-2">
<h3><?php echo $donnees['nom_recette'];?></h3>
<a href="image/image_recettes/<?php  echo $donnees['image']; ?>"><img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="" width="200" height="200"></a>
<p><a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>">ajouter par <?php  echo $donnees['auteur'];?></a></p>
<p><?php echo $donnees['cout']; ?> <br/>Temps de realisation:<?php  echo $donnees['temps_execution']; ?></p>
</div>
<?php
}
?>
</div>
<?php
}

?>
</div>
</div>
</html>
