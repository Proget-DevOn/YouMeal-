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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="manifest" href="/YouMeal-/manifest.JSON" id="manifest-placeholder">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>Ajout recette</title>
  </head>
  <body class="fond_radiant">

    <?php require ('header.html');?>
    <div class="row justify-content-center">
      <div class="col-6 col-md-4 text-center">

          <h1 class="police_monogram mt-5 mb-5">
            Ajouter une recette
          </h1>
          <?php include("upload.php");?>
          <form class="needs-validation" enctype="multipart/form-data" novalidate action="ajout_recette.php" method="post">
            <input type="text"class="form-control mt-4 contour_rose"  name="image" readonly placeholder="image" style="display:none"value= <?php echo $images?>>
            <input type="hidden"class="form-control mt-4 contour_rose"  name="auteur" readonly value= <?php echo $_SESSION['login']?>>
            <input type="text" class="form-control mt-5 contour_rose"  name="nom_recette" id="nom_recette" placeholder="Nom de la recette" required/>
            <input type="text" onfocus="(this.type='time')" class="form-control mt-4 contour_rose" name="temps_execution" id="temps_execution"placeholder="Temps de préparation" required/>

            <select name="cout" class="form-control mt-4 contour_rose"  id="cout">
              <option value="">Coût de la recette</option>
              <option value="economique">Economique</option>
              <option value="moyen">Moyen</option>
              <option value="couteux">Couteux</option>
            </select>

            <select name="categorie" class="form-control mt-4 contour_rose"  id="categorie">
              <option value="">Catégorie de la recette</option>
              <option value="aperitif">Apéritif</option>
              <option value="entree">Entrée</option>
              <option value="plat">Plat</option>
              <option value="dessert">Dessert</option>
            </select>

            <select name="regime" class="form-control mt-4 contour_rose"  id="regime">
              <option value="">Régime alimentaire</option>
              <option value="healthy">Healthy</option>
              <option value="vegetarien">Végétarien</option>
              <option value="vegan">Vegan</option>
              <option value="autre">Autre</option>

            </select>
            <button class="btn bouton_sinscrire text-white mt-4 mb-5 border-rose-btn center-block px-5" type="submit">Valider</button>
          </form>

      </div>
    </div>
  </body>
</html>
