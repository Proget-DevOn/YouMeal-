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
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
      </label>
      <label class="logo">YouMeal</label>

      <div class="barre_recherche_div">
        <form  method="GET" action="">
          <button class="barre_recherche_btn" type="submit" value="chercher"><img src="ressources/recherche.png" alt="recherche"></button>
          <input class="barre_recherche_input" type="text" name="recherche">
        </form>
      </div>

      <ul>
          <li><a href="#">MENU1</a></li>
          <li><a href="#">MENU2</a></li>
          <li><a href="deconnexion.php">DECONNEXION</a></li>
      </ul>

      <a href=""><img src="ressources/messagerie.png" alt="messages"></a>

    </nav>

    <?php
    session_start();

    if(!isset($_SESSION['login']))
    {
      include('connexion.html');
      die('');
    }?>


    include("upload.php");?>
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="ajout_recette.php" method="post">
      <input type="text"class="form-control mt-4 border-rose-input"  name="image" readonly placeholder="image" value= <?php echo $images?>>
      <div>
        <h1>
          Info recette
        </h1>
        <input type="hidden"class="form-control mt-4 border-rose-input"  name="auteur" readonly value= <?php echo $_SESSION['login']?>>
      <input type="text" class="form-control mt-4 border-rose-input"  name="nom_recette" id="nom_recette" placeholder="nom de la recette" required/>
      <label for="cout-select">Temps de réalisation:</label>
      <input type="time" class="form-control mt-1 border-rose-input" name="temps_execution" id="temps_execution"placeholder="temps d'execution" required/>
      <select name="cout" class="form-control mt-4 border-rose-input"  id="cout">
          <option value="">quel est le cout </option>
          <option value="economique">économique</option>
          <option value="moyen">moyen</option>
          <option value="couteux">couteux</option>
      </select>
      <select name="categorie" class="form-control mt-4 border-rose-input"  id="categorie">
          <option value="">quel est la categorie </option>
          <option value="entree">entrée</option>
          <option value="plat">plat</option>
          <option value="desert">desert</option>
          <option value="aperitif">apéritif</option>
      </select>
      <select name="regime" class="form-control mt-4 border-rose-input"  id="regime">
          <option value="">regime alimantaire </option>
          <option value="helthy">helthy</option>
          <option value="vegetarien">vegetarien</option>
          <option value="vegan">vegan</option>
          <option value="autre">autre</option>
      </select>
      </div>
      <button class="btn bg-rose-btn text-white mt-4 mb-5 border-rose-btn center-block px-5" type="submit">Valider</button>
    </form>
</html>
