<form enctype="multipart/form-data" action="" method="POST">
  <p>Charger votre fichier</p>
<input type="file" name="image"></input>
  <input type="submit" value="charger"></input>
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


    $path = "image/profil/";
    $path = $path . basename( $_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      echo "Le document ".  basename( $_FILES['image']['name']).
      " a bien été envoyé";
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
