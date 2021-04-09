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
    ?>
    <form class="needs-validation"  novalidate action="ajout_ingredient" method="post">
      <div class="col-sm-3 mt-4" id="inserer_ing">
        <h2>
          Ingredients
        </h2>
        <label>nombre d'ingredients:</label>
        <var id='nb_ing'>1</var>
        <input type="hidden" id="id_recette" name="id_recette" value=""required/>
    <!--  <input type="hidden"  id="nb" name="nb" value=""  required/>-->
    <div>
      <input type="hidden"  id="n_ingredient" name="n_ingredient" value=""  required/>
      <input type="hidden"  id="n_etape" name="n_etape" value=""  required/>
    </div>
        <div>
          <input type="text" class="form-control  border-rose-input" name="ingredient1"  id="ingredient1" placeholder="ingredient" required/>
        </div>

      </div>
      <div id="inserer_etp">
        <h2 class="form--header-title">
          Etape de la recette
        </h2>
        <label>nombre d'etape:</label>
        <var id='nb_etape'>1</var>
        <textarea class="form-control mt-4 border-rose-input" name="etape1"  id="etape1" placeholder="etape 1" required/></textarea>
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
    ingredient.setAttribute("class","form-control mb-5 border-rose-input");
    ingredient.setAttribute("id","ingredient"+click_ing);
    ingredient.setAttribute("name","ingredient"+click_ing);
    let i =document.getElementById('nb_ing').innerHTML = click_ing;
    document.getElementById("n_ingredient").value = click_ing;

  }
  function ajout_etape(){
    click_etape+=1;
  let etape= document.createElement("textarea");
    etp.appendChild(etape);
    etape.setAttribute("class","form-control mt-4 border-rose-input");
    etape.setAttribute("name","etape"+click_etape);
    etape.setAttribute("id","etape"+click_etape);
    let i =document.getElementById('nb_etape').innerHTML = click_etape;
    document.getElementById("n_etape").value = click_etape;
  }
  </script>

</script>
</html>
