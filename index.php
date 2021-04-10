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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">

    <?php
    session_start();

    if(!isset($_SESSION['login']))
    {
      header('Location:connexion.html');
      die('');
    }else{
      require ('header.html');
    }
    ?>



    <!-- Barre Navigation

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

    -->



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
      <div class="col-sm--3">
        <h3><a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>"><?php echo $donnees['nom_recette'];?></a></h3>
        <a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>"><img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="recette" width="200" height="200"></a>
        <p><a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>">ajouter par <?php  echo $donnees['auteur'];?></a></p>
        <p><?php echo $donnees['cout']; ?> Temps de realisation:<?php  echo $donnees['temps_execution']; ?> regime:<?php  echo $donnees['regime']; ?> miam<?php  echo $donnees['note']; ?> </p>
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
      <p class="mx-5 bolt"><strong>Qu'est-ce qu'on prépare aujourd'hui?</strong></p>

      <div class="text-center mt-5">
        <p><a href="ajouter_recette.php">ajouter une recette</a></p>
      </div>

      <?php $sql='SELECT * FROM recettes';
      $rep = $conn->query($sql);
      while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
      {

    ?>

    <div class="row">
      <div class="col-sm-4">
        <h3><a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>"><?php echo $donnees['nom_recette'];?></a></h3>
        <a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>"><img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="recette" width="300" height="200"></a>
        <p><a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>">ajouter par <?php  echo $donnees['auteur'];?></a></p>
        <p><?php echo $donnees['cout']; ?> Temps de realisation:<?php  echo $donnees['temps_execution']; ?> regime:<?php  echo $donnees['regime']; ?> miam<?php  echo $donnees['note']; ?> </p>
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
  </body>
</html>
