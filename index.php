<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
    <title>YouMeal</title>
  </head>
  <body>
      
    
    <?php
    session_start();

    if(!isset($_SESSION['login']))
    {
      include('connexion.html');
      die('');
    }?>

    <!-- TOP -->
    
    <div class="container">
      <div class="row justify-content-center align-items-center mt-5">

        <div class="col-3 text-center">
          <img src="ressources/bouton_menu.png" alt="">
        </div>

        <div class="col-6 text-center">
          <form  method="GET" action="">
            <div class="barre_recherche_div">
              <button class="barre_recherche_btn" type="submit" value="chercher"><img src="ressources/recherche.png" alt="recherche"></button>
              <input class="barre_recherche_input" type="text" name="recherche">
            </div>
          </form>
        </div>

        <div class="col-3 text-center">
          <img src="ressources/messagerie.png" alt="messages">
        </div>

      </div>
    </div>



    <?php
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
        while($donnees = $rep->fetch(PDO::FETCH_ASSOC)){
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
      <h1 class="police_monogram mx-5 mt-5">Hello
      <?php
      echo htmlspecialchars($_SESSION['login']);?> !</h1>
      <?php $sql='SELECT * FROM recettes';
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
    <p class="mx-5 bolt"><strong>Qu'est-ce qu'on prépare aujourd'hui?</strong></p>

    <div class="text-center mt-5"> 
      <p><a href="ajouter_recette.php">ajouter une recette</a></p>
    </div>

  </body>
</html>
