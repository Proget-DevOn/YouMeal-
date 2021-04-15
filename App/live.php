<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
      include('connexion.html');
      die('');
    }
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/affiche_recette.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src='https://meet.jit.si/external_api.js'></script>
    <link rel="manifest" href="/YouMeal-/manifest.JSON" id="manifest-placeholder">

    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">

    <?php
    require ('header.html');
    include('config.php');
    global $conn;
    if(!isset($_GET['ID_live']))
{
  $dest="liste_live.php";
 echo '<script language="JavaScript">window.location=\'' . $dest.'\'</script>';
}
$sql="SELECT * FROM live WHERE ID_live='".$_GET['ID_live']."'";
$rep = $conn->query($sql);
if($donnees = $rep->fetch(PDO::FETCH_ASSOC))
{
  $date = new DateTime('now');
$diff = new DateTime($donnees['date_live']);
date_diff($date,$diff);
if ($date < $diff ){
  $sql2="SELECT * FROM recettes WHERE id_recette='".$donnees['ID_recette']."'";
  $req= $conn->query($sql2);
  while($don = $req->fetch(PDO::FETCH_ASSOC))
  {
    ?>
    <div class="top_recette">
      <h3  class="police_monogram titre_recette"><?php echo $don['nom_recette'];?></h3>
      <div class="div_image">
      <?php if(is_file("image/image_recettes/".$don['image']))
      {?>
        <img class="image" src="image/image_recettes/<?php  echo $don['image']; ?>" alt="recette">
        <?php
      }else
      {?>
        <img class="image" src="ressources/images/pas_image.jpg" alt="">
        <?php
      }?>
        <div class="photo_profil"></div>
        <a href="profil.php?pseudo=<?php  echo $don['auteur']; ?>">Recette par <?php  echo $don['auteur'];?></a>
      </div>
      <div class="boutons_recette">
        <a href=""><img src="ressources/images/like.png" alt="like"></a>
        <a href=""><img src="ressources/images/partager.png" alt="partager"></a>
      </div>
    </div>

    <div class="infos_recette">
      <p class="une_info">Coût: <?php echo $don['cout']; ?></p>
      <p class="une_info">Temps de réalisation: <?php  echo $don['temps_execution'];?> heures</p>
      <p class="une_info">Régime: <?php  echo $don['regime'];?></p>
      <p class="une_info">Note: <?php  echo $don['note'];?></p>
    </div>
    <?php
  }?>



  <div class="ing_pre">
    <div class="ingredients p-3">
      <h4 class="pb-3">Ingrédients</h4>
      <?php
        $sql="SELECT * FROM ingredients where id_recette='".$donnees['ID_recette']."'";
        $req= $conn->query($sql);
        while($don = $req->fetch(PDO::FETCH_ASSOC))
        {
          ?>
          <strong><?php  echo $don['nom_ingredient']; ?></strong><br>
          <?php
        }
      ?>
    </div><?php


}
else{
  include('live.js');
  ?><div id="meet"><?php
}

}
?>
<? include('footer.html')?>
</body>
</html>
