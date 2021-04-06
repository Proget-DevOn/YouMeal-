<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">

    <title>ajout recette</title>
  </head>
  <body>
    <?php
    session_start();

    if(!isset($_SESSION['login']))
    {

      include('connexion.html');
      die('');

    }
    include("upload.php");?>
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="ajout_recette.php" method="post">
      <input type="text"class="form-control mt-4 border-rose-input"  name="image" readonly placeholder="image" value= <?php echo $images?>>
      <div>
        <h1>
          Info recette
        </h1>
        <input type="text"class="form-control mt-4 border-rose-input"  name="auteur" readonly value= <?php echo $_SESSION['login']?>>
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
      <div id="inserer_ing">
        <h2>
          Ingredients
        </h2>
        <input type="number" class="form-control mt-4 border-rose-input" name="quantite"  id="1" placeholder="15" required/>
          <input type="text" class="form-control mt-4 border-rose-input" name="ingredient"  id="1" placeholder="ingredient1" required/>

      </div>
      <div id="inserer_etp">
        <h2 class="form--header-title">
          Etape de la recette
        </h2>
        <textarea class="form-control mt-4 border-rose-input" name="etape"  id="1" placeholder="etape 1" required/></textarea>
      </div>
      <button class="btn bg-rose-btn text-white mt-4 mb-5 border-rose-btn center-block px-5" type="submit">Valider</button>
    </form>
  </body>
  <script>
  let click_ing=1;
  let click_etape=1;
  let ing=document.getElementById("inserer_ing");
  let etp=document.getElementById("inserer_etp");
  let bouton1 = document.createElement("button");
	let texte1 = document.createTextNode("ajouter un ingredient");
	bouton1.appendChild(texte1);
	bouton1.addEventListener("click",ajout_ingredient,false);
	document.body.appendChild(bouton1);
  bouton1.setAttribute("class","btn bg-rose-btn text-white mt-4 mb-5 border-rose-btn center-block px-5")

  let bouton2 = document.createElement("button");
	let texte2 = document.createTextNode("ajouter une etape");
	bouton2.appendChild(texte2);
	bouton2.addEventListener("click",ajout_etape,false);
	document.body.appendChild(bouton2);
  bouton2.setAttribute("class","btn bg-rose-btn text-white mt-4 mb-5 border-rose-btn center-block px-5")
  function ajout_ingredient(){
    click_ing+=1;
    let ingredient= document.createElement("input");
    ing.appendChild(ingredient);
    ingredient.setAttribute("class","form-control mt-4 border-rose-input");
    ingredient.setAttribute("id",click_ing);
  }
  function ajout_etape(){
    click_etape+=1;
  let etape= document.createElement("textarea");
    etp.appendChild(etape);
    etape.setAttribute("class","form-control mt-4 border-rose-input");
    etape.setAttribute("id",click_etape);
  }
  </script>

</script>
</html>
