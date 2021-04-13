<button type="button" class="btn btn-success">Modifier mes information</button><br/>
 <?php
include("upload-profil.php");?>
    <form enctype="multipart/form-data" action="" method="POST">
    	  <p>

    		<textarea name="bio" rows="8" cols="45" placeholder="bio" required></textarea>
    	</p>

    	  <p><input type="submit" value="OK"></p>
        </form>
      </div>
        <?php if (isset($_POST['prenom']))
        {
          $rep=$conn->query("SELECT * from utilisateurs where pseudo='".$_SESSION['login']."'");
          if ($donnees=$rep->fetch(PDO::FETCH_BOTH))
          {
            $sql="UPDATE utilisateurs SET photo='".$_POST['image']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $sql="UPDATE profil SET bio='".$_POST['interet']."' WHERE pseudo='".$_SESSION['login']."'";
            $req=$conn->query($sql);
            $dest="profil.php";
             echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
           }
         }

          ?>
