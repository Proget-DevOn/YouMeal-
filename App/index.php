<?php session_start();

if(!isset($_SESSION['login']))
{
  header('Location:connexion.html');
  die('');
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="black">


    <link rel="apple-touch-icon" href="ressources/logo_youmeal.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/liste_recette.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="manifest" href="manifest.json" id="manifest-placeholder">

    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">


  <div id="loading">
  <img id="loading-image" src="ressources/loading-page.png" alt="Loading..." />
</div>

    <?php
    if(isset($_SESSION['login']))
    {
      require ('header.html');
    }
    include('config.php');
    global $conn;
    if(isset($_GET['recherche']))
    {?>

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
        }
        ?>

      </div>

      <?php
    }
    else 
    {
      ?>
      <h1 class="police_monogram mx-5" style="text-transform: capitalize;">Hello
      <?php
      echo htmlspecialchars($_SESSION['login']);?> !</h1>
      <p class="mx-5 bolt"><strong>Qu'est-ce qu'on pr??pare aujourd'hui?</strong></p>
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

      <div class="colonnes justify-content-center">
        <h1 class="police_monogram">Quelques recettes</h1>
          <?php $sql='SELECT * FROM recettes order by rand()';
          $rep = $conn->query($sql);
          $cpt = 0;
          while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
          {
            if($cpt < 3)
            include("composant_aff_recette.php");
            $cpt++;
          }
            ?>
      </div>

      <div class="colonnes justify-content-center">
        <h1 class="police_monogram">Quelques lives</h1>
          <?php $sql='SELECT * from live inner join recettes on live.ID_recette=recettes.id_recette order by rand()';
          $rep = $conn->query($sql);
          $cpt = 0;
          while($donnees = $rep->fetch(PDO::FETCH_ASSOC))
          {
            if($cpt < 3)
            { ?>
              <div class="div_recette" style="background-image: url('image/image_recettes/<?php  echo $donnees['image']; ?>');">
                <a href="live.php?ID_live=<?php  echo $donnees['ID_live']; ?>"><img class="image" src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt=""></a>
                <a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>" class="auteur_recette"><?php  echo $donnees['auteur'];?></a><br>
                <!-- <a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>">
                  <img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="recette" width="300" height="200">
                </a> -->
                <strong><a href="live.php?ID_live=<?php  echo $donnees['ID_live']; ?>" class="nom_recette">
                  <?php echo $donnees['nom_recette'];?>
                </a></strong>
                <p class="categorie_recette"><?php echo $donnees['date_live']; ?></p>
                <!-- <p><?php echo $donnees['cout']; ?> Temps de realisation:<?php  echo $donnees['temps_execution']; ?> R??gime:<?php  echo $donnees['regime']; ?> Miam<?php  echo $donnees['note']; ?> </p> -->
              </div>
              <?php $cpt++;
            } ?>
            <?php
          }
            ?>
        </div>
      <?php
      include('footer.html');
    }?>
    
  </body>

</html>

<?php
echo '<script>window.onload = function(){ document.getElementById("loading").style.display = "none" }</script>';
?>
