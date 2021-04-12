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

    <title>YouMeal</title>
  </head>

  <body class="fond_radiant">


    <?php
    session_start();

    if(!isset($_SESSION['login']))
    {
      include('connexion.html');
      die('');
    }
    require ('header.html');
    ?>
<?php if (!isset($_GET['id_recette'])) {
  $dest="index.php";
  echo '<script language="JavaScript">window.location=\'' . $dest.'\'</script>';
} ?>
    <form class="needs-validation"  novalidate action="ajout_ingredient" method="post">
      <div class="row justify-content-center mt-5">

        <div class="col-4 col-md-4 text-center" id="inserer_ing">
          <h2>
            Ingredients
          </h2>
          <label>Nombre d'ingrédients:</label>
          <var id='nb_ing'>1</var>
          <input type="hidden" id="id_recette" name="id_recette" value=""required/>
          <!--  <input type="hidden"  id="nb" name="nb" value=""  required/>-->
          <div>
            <input type="hidden"  id="n_ingredient" name="n_ingredient" value=""  required/>
            <input type="hidden"  id="n_etape" name="n_etape" value=""  required/>
            <input type="text" class="form-control contour_rose" name="ingredient1"  id="ingredient1" placeholder="ingredient" required/>
          </div>
        </div>

        <div class="col-6 col-md-6 text-center" id="inserer_etp">
          <h2 class="form--header-title">
            Etapes de la recette
          </h2>
          <label>Nombre d'étapes:</label>
          <var id='nb_etape'>1</var>
          <textarea class="form-control contour_rose" name="etape1"  id="etape1" placeholder="etape 1" required></textarea>
        </div>

      </div>
    </form>
  </body>
  
  <script>
  let click_ing=1;
  let click_etape=1;
  let ing=document.getElementById("inserer_ing");
  let etp=document.getElementById("inserer_etp");
  let bouton1 = document.createElement("button");
	let texte1 = document.createTextNode("Ajouter un ingrédient");
	bouton1.appendChild(texte1);
	bouton1.addEventListener("click",ajout_ingredient,false);
	document.body.appendChild(bouton1);
  bouton1.setAttribute("class","btn mt-5 mb-5 contour_rose bg-white text-danger center-block px-5")

  let bouton2 = document.createElement("button");
	let texte2 = document.createTextNode("Ajouter une étape");
	bouton2.appendChild(texte2);
	bouton2.addEventListener("click",ajout_etape,false);
	document.body.appendChild(bouton2);
  bouton2.setAttribute("class","btn mt-5 mb-5 contour_rose bg-white text-danger center-block px-5 mx-4")
  function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace(
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;
	}
	return vars;
}
let recette=$_GET('id_recette');
document.getElementById("id_recette").value = recette;

  function ajout_ingredient(){
    click_ing+=1;
    let ingredient= document.createElement("input");
    ing.appendChild(ingredient);
    ingredient.setAttribute("class","form-control mt-2 contour_rose");
    ingredient.setAttribute("id","ingredient"+click_ing);
    ingredient.setAttribute("name","ingredient"+click_ing);
    let i =document.getElementById('nb_ing').innerHTML = click_ing;
    document.getElementById("n_ingredient").value = click_ing;

  }
  function ajout_etape(){
    click_etape+=1;
  let etape= document.createElement("textarea");
    etp.appendChild(etape);
    etape.setAttribute("class","form-control mt-2 contour_rose");
    etape.setAttribute("name","etape"+click_etape);
    etape.setAttribute("id","etape"+click_etape);
    let i =document.getElementById('nb_etape').innerHTML = click_etape;
    document.getElementById("n_etape").value = click_etape;
  }
  </script>
  <button class="btn bouton_sinscrire text-white mt-5 mb-5 contour_rose center-block px-5" type="submit">Valider</button>
</script>
</html>
