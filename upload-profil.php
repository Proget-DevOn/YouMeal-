<form enctype="multipart/form-data" action="" method="POST">
  <p>charger votre fichier</p>
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
      echo "le document ".  basename( $_FILES['image']['name']).
      " a ete envoyer";
      $images=$_FILES['image']['name'];

    }
    else{
      echo " une erreur a eu lieu lors de l'envoi";
    }

  }
else
{
     echo $erreur;
}
}
?>
