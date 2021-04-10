<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">
    <?php require ('header.html');?>

    <?php
    session_start();
    include('config.php');
    global $conn;
    if(!isset($_SESSION['login']))
    {
      include('connexion.html');
      die('');
    }?>
<?php
$sql="SELECT * FROM recettes WHERE id_recette='".$_GET['id_recette']."'";
$req= $conn->query($sql);
echo $sql;
while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
?>
<div class="info_recette">
  <h3><?php echo $donnees['nom_recette'];?></h3>
  <img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="recette" width="200" height="200">
  <p><a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>">ajouter par <?php  echo $donnees['auteur'];?></a></p>
  <p><?php echo $donnees['cout']; ?> Temps de realisation:<?php  echo $donnees['temps_execution']; ?> regime:<?php  echo $donnees['regime']; ?> miam<?php  echo $donnees['note']; ?> </p>
  <?php
}?>
</div>
<div class="ingredients">
  <h2>ingredients:</h2>
  <?php
    $sql="SELECT * FROM ingredients where id_recette='".$_GET['id_recette']."'";
    $req= $conn->query($sql);
    while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
    ?>
<strong><?php  echo $donnees['nom_ingredient']; ?></strong>
</div>
<?php
} ?>


<div class="etape">
  <?php
  $sql="SELECT * FROM preparation where id_recette='".$_GET['id_recette']."' order by id_etape";
  $req= $conn->query($sql);
  while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
  ?>
  <h4>etape<?php  echo $donnees['id_etape']; ?></h4>
  <p><?php  echo $donnees['description_etape']; ?><p>
</div>
<div class="chat">

</div>
<?php
}
 ?>

</html>
