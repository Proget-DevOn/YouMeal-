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
    <link rel="manifest" href="manifest.JSON" id="manifest-placeholder">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/header.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src='https://meet.jit.si/external_api.js'></script>
    <script src='https://8x8.vc/external_api.js'></script>
    <title>YouMeal - Mon profil</title>
  </head>

  <body class="fond_radiant">


    <?php
    include("header.html");

    include("config.php");
    global $conn;
    //afficher le profil d'une autre personne
 if(isset($_GET["pseudo"]))
 {
 $rep=$conn->query("SELECT * from utilisateurs");
while($donnees=$rep->fetch(PDO::FETCH_BOTH))
{
  if( $donnees['pseudo']==$_GET['pseudo'])
  {
    ?>

    <div class="body-center">
      <h2>Profil de <div style="text-transform: capitalize; display:inline-block"><?php echo $donnees['pseudo'];?></div></h2>

      <div class="div_image">
          <?php if(is_file("image/profil/".$donnees['photo']))
          {?>
            <img class="img-profil" width="300" height="auto" class="image" src="image/profil/<?php  echo $donnees['photo']; ?>" alt="recette">
            <?php
          }else
          {?>
            <img class="img-profil" width="300" height="auto" class="image" src="ressources/images/pas_image.jpg" alt="">
            <?php
          }?>
      </div>

      <p style="text-transform: capitalize;"><strong>Nom:</strong> <?php echo $donnees['nom'];?></p><?php
      ?><p style="text-transform: capitalize;"><strong>Pr??nom:</strong> <?php echo $donnees['prenom'];?></p>
      <p><strong>Bio:</strong> <?php echo $donnees['bio'];?></p>
  <?php
}
}?>

      <a href="chat.php?a=<?php  echo $_GET['pseudo']; ?>">Envoyer un message</a><br/>
      <a href="sabonner.php?pseudo=<?php  echo $_GET['pseudo']; ?>"><button type="button" class="btn bouton_sinscrire text-white mt-5 mb-5 contour_rose center-block px-5" name="suivre">S'abonner</button></a>
    </div>
<?php
$rep=$conn->query("SELECT * from abonnement inner join utilisateurs on abonnement.pseudo_abonnement=utilisateurs.pseudo and pseudo_abonne='". $_GET['pseudo']."'");
          while ($donnees=$rep->fetch(PDO::FETCH_BOTH)){
            ?><p><strong> <?php echo $donnees['pseudo'];?></strong></p>
           <a href="profil.php?pseudo=<?php  echo $donnees['pseudo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="100" height="100"></a>
           <?php
          }
          $rep=$conn->query("SELECT * from abonnement  inner join utilisateurs on abonnement.pseudo_abonne=utilisateurs.pseudo and pseudo_abonnement='". $_GET['pseudo']."'");
          if ($donnees=$rep->fetch(PDO::FETCH_BOTH)){
            ?><p><strong> <?php echo $donnees['pseudo'];?></strong></p>
            <a href="profil.php?pseudo=<?php  echo $donnees['pseudo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="100" height="100"></a>
           <?php

          }

}

//afficher son profil
else {
  $rep=$conn->query("SELECT * from utilisateurs");
 while($donnees=$rep->fetch(PDO::FETCH_BOTH))
 {
   if( $donnees['pseudo']==$_SESSION['login'])
   {
     ?>

    <div class="body-center">
     <h2 style="text-transform: capitalize;"><?php echo $donnees['pseudo'];?></h2>

      <div class="div_image">
          <?php if(is_file("image/profil/".$donnees['photo']))
          {?>
            <img class="img-profil" width="300" height="auto" class="image" src="image/profil/<?php  echo $donnees['photo']; ?>" alt="recette">
            <?php
          }else
          {?>
            <img class="img-profil" width="300" height="auto" class="image" src="ressources/images/pas_image.jpg" alt="">
            <?php
          }?>
      </div>

    <p><strong>Nom:</strong> <?php echo $donnees['nom'];?></p><?php
     ?><p><strong>Pr??nom:</strong> <?php echo $donnees['prenom'];?></p>
   <p><strong>Bio:</strong> <?php echo $donnees['bio'];?></p>
   <?php
  }
 }
 ?><a href="modifier.php"><button type="button" class="btn bouton_sinscrire text-white mt-5 mb-5 contour_rose center-block px-5" name="modifier">Modifier</button></a>
    </div><?php



   $rep=$conn->query("SELECT * from abonnement inner join utilisateurs on abonnement.pseudo_abonnement=utilisateurs.pseudo and pseudo_abonne='".$_SESSION['login']."'");
             while ($donnees=$rep->fetch(PDO::FETCH_BOTH)){
               ?><p><strong> <?php echo $donnees['pseudo'];?></strong></p>
              <a href="profil.php?pseudo=<?php  echo $donnees['pseudo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="100" height="100"></a>
              <?php
             }
             $rep=$conn->query("SELECT * from abonnement  inner join utilisateurs on abonnement.pseudo_abonne=utilisateurs.pseudo and pseudo_abonnement='".$_SESSION['login']."'");
             if ($donnees=$rep->fetch(PDO::FETCH_BOTH)){
               ?><p><strong> <?php echo $donnees['pseudo'];?></strong></p>
               <a href="profil.php?pseudo=<?php  echo $donnees['pseudo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="100" height="100"></a>
              <?php
             }
}
 ?>
</body>
</html>
