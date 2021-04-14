 <?php
 include('profil.php');

include("upload-profil.php");

?>
    <form enctype="multipart/form-data" action="" method="POST">
    	  <p>
          <input type="text"class="form-control mt-4 contour_rose"  name="image" readonly placeholder="image" style="display:none"value= <?php echo $images?>>
    		<textarea name="bio" rows="8" cols="45" placeholder="bio" name="bio"></textarea>
    	</p>

      <button class="btn bouton_sinscrire text-white mt-4 mb-5 border-rose-btn center-block px-5" type="submit">Valider</button>
        </form>
      </div>
        <?php
        if(isset($_POST)){
          $vide="";
          if($_POST['image']==$vide){
            echo "Vide";
            }
            else {
              $sql1="UPDATE utilisateurs SET photo='".$_POST['image']."' WHERE pseudo='".$_SESSION['login']."'";
              $req1=$conn->query($sql1);
              if ($req1=$conn->query($sql1)){
                 header("Refresh:0");
            }
            }

              if($_POST['bio']==$vide){
                echo "Vide";
              }
              else {
                $sql2="UPDATE utilisateurs SET bio='".$_POST['bio']."' WHERE pseudo='".$_SESSION['login']."'";
                if ($req2=$conn->query($sql2)){
                   header("Refresh:0");

                }
              }
        }





          ?>
