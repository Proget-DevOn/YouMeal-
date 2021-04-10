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
    }

include('config.php');
global $conn;

    //afficher le profil d'une autre personne
 if(isset($_GET["pseudo"]))
 {


 $rep=$conn->query("SELECT * from utilisateurs");
while($donnees=$rep->fetch(PDO::FETCH_BOTH))
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
  $rep=$conn->query("SELECT * from utilisateurs");
 while($donnees=$rep->fetch(PDO::FETCH_BOTH))
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
<button type="button" class="btn btn-success" data-toggle="collapse">modifier</button><br/>
<div id="profil" class="collapse"> <?php
include("upload_profil.php");?>
    <form enctype="multipart/form-data" action="" method="POST">
    	  <p>
    		<textarea name="bio" rows="8" cols="45" placeholder="bio" required /></textarea>
    	</p>

    	  <p><input type="submit" value="OK"></p>
        </form>
      </div>
        <?php if (isset($_POST['prenom']))
        {
          include("config.php");
          $rep=$conn->query("SELECT * from utilisateurs where pseudo='".$_SESSION['login']."'");
          if ($donnees=$rep->fetch(PDO::FETCH_BOTH))
          {
            $sql="UPDATE utilisateurs SET photo='".$_POST['image']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET bio='".$_POST['interet']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $dest="profil.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
             $rep=$conn->query("SELECT * from abonnement where pseudo_abonne='".$_SESSION['login']."'");
             if ($donnees=$rep->fetch(PDO::FETCH_BOTH)){

             }
             $rep=$conn->query("SELECT * from abonnement where pseudo_abonnement='".$_SESSION['login']."'");
             if ($donnees=$rep->fetch(PDO::FETCH_BOTH)){

             }


          }
          else {

            echo "erreur est survenue";
            $dest="page.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
          }
          }
        }


 ?>
</body>
</html>
