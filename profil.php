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
include('config.php');
    //afficher le profil d'une autre personne
 if(isset($_GET["pseudo"]))
 {


 $rep=$conn->query("SELECT * from utilisateurs");
while($donnees=$rep->fetch_assoc())
{
  if( $donnees['pseudo']==$_GET['pseudo'])
  {
    ?><h2>profil de <?php echo $donnees['pseudo'];?></h2>
    <a href="image/profil/<?php  echo $donnees['photo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="200" height="200"></a>
    <p>nom: <?php echo $donnees['nom'];?></p><?php
    ?><p>prenom: <?php echo $donnees['prenom'];?></p>
  <p>bio: <?php echo $donnees['bio'];?></p><?php
}
}?>
<a href="chat.php?a=<?php  echo $_GET['pseudo']; ?>">Envoyer un message</a><br/>
<?php
}
//afficher son profil
else {
  $rep=$conn->query("SELECT * from profil");
 while($donnees=$rep->fetch_assoc())
 {
   if( $donnees['pseudo']==$_SESSION['login'])
   {
     ?><h2>profil de <?php echo $donnees['pseudo'];?></h2>
     <a href="image/profil/<?php  echo $donnees['photo']; ?>"><img src="image/profil/<?php  echo $donnees['photo']; ?>" alt="" width="200" height="200"></a>
     <p>nom: <?php echo $donnees['nom'];?></p><?php
     ?><p>prenom: <?php echo $donnees['prenom'];?></p>
   <p>bio: <?php echo $donnees['bio'];?></p><?php
  }
 }


?>
<!--formulaire depliant avec bootstrap-->
<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#profil">bio</button><br/>
<div id="profil" class="collapse"> <?php
include("upload_profil.php");?>
    <form enctype="multipart/form-data" action="" method="POST">
    	  <p>
    		<textarea name="interet" rows="8" cols="45" placeholder="centre d'intêret" required /></textarea>
    	</p>

    	  <p><input type="submit" value="OK"></p>
        </form>
      </div>
        <?php if (isset($_POST['prenom']))
        {
          include("config.php");
          $rep=$conn->query("SELECT * from utilisateurs where pseudo='".$_SESSION['login']."'");
          if ($donnees=$rep->fetch_assoc())
          {
            $sql="UPDATE utilisateurs SET photo='".$_POST['image']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET bio='".$_POST['interet']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $dest="profil.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';


          }
          else {

            echo "erreur est survenue";
            $dest="page.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
          }
          }
        }


 ?>
<?php include("footer.php");
?>
</body>
</html>
