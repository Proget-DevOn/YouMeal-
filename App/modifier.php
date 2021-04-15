 <?php
include("upload-profil.php");

?>
    <form enctype="multipart/form-data" action="modif_profil.php" method="POST">
    	  <p>
          <input type="text"class="form-control mt-4 contour_rose"  name="image" readonly placeholder="image" style="display:none"value= <?php echo $images?>>
    		<textarea name="bio" rows="8" cols="45" placeholder="bio" name="bio"></textarea>
    	</p>

      <button class="btn bouton_sinscrire text-white mt-4 mb-5 border-rose-btn center-block px-5" type="submit">Valider</button>
        </form>
      </div>
      <?php
     include("profil.php");

     ?>
