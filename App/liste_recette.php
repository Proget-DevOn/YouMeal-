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
    <link rel="stylesheet" href="css/liste_recette.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="manifest" href="manifest.JSON" id="manifest-placeholder">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">

    <?php
      if(isset($_SESSION['login']))
      {
        require ('header.html');
      }

      include('config.php');
      global $conn;
      if(isset($_GET['recherche']))
      { ?>

        <div class="colonnes justify-content-center">

          <?php $sql="SELECT * from recettes WHERE
          nom_recette LIKE '%".$_GET['recherche']."%'
          OR auteur LIKE '%".$_GET['recherche']."%'
          OR  regime like '%".$_GET['recherche']."%'
          OR categorie like '%".$_GET['recherche']."%'";
          $rep = $conn->query($sql);
          while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
          {
            include("composant_aff_recette.php");
          } ?>
        </div>
        <?php
      }else
      {
        ?>
        <div class="container_categorie">
        <div class="div_categorie">
          <a href="liste_recette.php?recherche=aperitif"><div class="cercle" style="background-image: url('ressources/images/categorie_aperitif.jpg')"></div></a>
          <a class="lien_categorie" href="liste_recette.php?recherche=aperitif">Ap??ritifs</a>
        </div>
        <div class="div_categorie">
          <a href="liste_recette.php?recherche=entree"><div class="cercle" style="background-image: url('ressources/images/categorie_entree.jpg')"></div></a>
          <a class="lien_categorie" href="liste_recette.php?recherche=entree">Entr??es</a>
        </div>
        <div class="div_categorie">
          <a href="liste_recette.php?recherche=plat"><div class="cercle" style="background-image: url('ressources/images/categorie_plat.jpeg')"></div></a>
          <a class="lien_categorie" href="liste_recette.php?recherche=plat">Plats</a>
        </div>
        <div class="div_categorie">
          <a href="liste_recette.php?recherche=dessert"><div class="cercle" style="background-image: url('ressources/images/categorie_dessert.jpeg')"></div></a>
          <a class="lien_categorie" href="liste_recette.php?recherche=dessert">Desserts</a>
        </div>
      </div>
        <div class="text-center mt-5">
          <p><a class="lien_ajout_recette police_monogram" href="ajouter_recette.php">Ajouter une recette</a></p>
        </div>

        <div class="colonnes justify-content-center">

          <?php $sql='SELECT * FROM recettes';
          $rep = $conn->query($sql);
          while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
          {
            include("composant_aff_recette.php");
          }
            ?>
        </div>

        <?php
        include('footer.html');
      }
        ?>
        
  </body>
</html>


