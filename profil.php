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
    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">
<<<<<<< HEAD

    <?php

    session_start();
    include("header.html");
    if(!isset($_SESSION['login']))
    {
      include('connexion.html');
      die('');
    }
    include("config.php");
    global $conn;
    //afficher le profil d'une autre personne
=======
<?php
  include('header.html');
  include("config.php");
  global $conn;
  //afficher le profil d'une autre personne
>>>>>>> 499a4a27edebb6fb58a77011ddfbdfb779985be6
 if(isset($_GET["pseudo"]))
 {
 $rep=$conn->query("SELECT * from utilisateurs");
while($donnees=$rep->fetch(PDO::FETCH_BOTH))
{
  if( $donnees['pseudo']==$_GET['pseudo'])
  {
    ?><h2>Profil de <?php echo $donnees['pseudo'];?></h2>
    <a href="image/profil/<?php  echo $donnees['photo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="200" height="200"></a>
    <p>Nom: <?php echo $donnees['nom'];?></p><?php
    ?><p>Prénom: <?php echo $donnees['prenom'];?></p>
  <p>Bio: <?php echo $donnees['bio'];?></p><?php
}
}?>
<a href="chat.php?a=<?php  echo $_GET['pseudo']; ?>">Envoyer un message</a><br/>
<a href="sabonner.php?pseudo=<?php  echo $_GET['pseudo']; ?>"><button type="button" class="btn bouton_sinscrire text-white mt-5 mb-5 contour_rose center-block px-5" name="suivre">s'sabonner</button></a>
<?php
}

//afficher son profil
else {
  $rep=$conn->query("SELECT * from utilisateurs");
 while($donnees=$rep->fetch(PDO::FETCH_BOTH))
 {
   if( $donnees['pseudo']==$_SESSION['login'])
   {
     ?><h2><?php echo $donnees['pseudo'];?></h2>
     <a href="image/profil/<?php  echo $donnees['photo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="200" height="200"></a>
     <p>Nom: <?php echo $donnees['nom'];?></p><?php
     ?><p>Prénom: <?php echo $donnees['prenom'];?></p>
   <p>Bio: <?php echo $donnees['bio'];?></p><?php
  }
 }
 ?><a href="modifier.php"><button type="button" class="btn bouton_sinscrire text-white mt-5 mb-5 contour_rose center-block px-5" name="modifier">Modifier</button></a><?php

}


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






 ?>
</body>
</html>
