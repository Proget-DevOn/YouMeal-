<form enctype="multipart/form-data" action="" method="POST">
  <p>Choisissez une image pour votre recette</p>
  <input type="file" name="image"></input>
  <input class="mt-2" type="submit" value="Charger"></input>
</form>

<?php
$images="";
if(!empty($_FILES['image']))
{
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['image']['name'], '.');

if(!in_array($extension, $extensions))
{
     $erreur = 'Vous devez choisir un fichier de type png, gif, jpg, jpeg...';
}
if(!isset($erreur))
{
    $path = "image/image_recettes/";
    $path = $path . basename( $_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      echo "le document ".  basename( $_FILES['image']['name']).
      " a été chargé";
      $images=$_FILES['image']['name'];

    }
    else{
      echo "Une erreur a eu lieu lors de l'envoi";
    }
  }
else
{
  echo $erreur;
}
}
?>
