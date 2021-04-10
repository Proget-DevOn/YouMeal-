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
        <li><a href="profil.php">PROFIL</a></li>
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
    <h1>programation d'un live</h1>
    <p></p>
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="ajout_recette.php" method="post">
    <input type="datetime-local" class="form-control mt-1 border-rose-input"id="date_live" name="date_live" placeholder="date de la diffusion"/>
    <button class="btn bg-rose-btn text-white mt-4 mb-5 border-rose-btn center-block px-5" type="submit">Valider</button>


    </form>

    </body>
    </html>
