<div class="div_recette" style="background-image: url('image/image_recettes/<?php  echo $donnees['image']; ?>');">
    <?php if(is_file("image/image_recettes/".$donnees['image']))
    {?>
        <a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>"><img class="image" src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt=""></a>
        <?php
    }else
    {?>
        <a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>"><img class="image" src="ressources/images/pas_image.jpg" alt=""></a>
        <?php
    }?>
    <a href="profil.php?pseudo=<?php  echo $donnees['auteur']; ?>" class="auteur_recette"><?php  echo $donnees['auteur'];?></a><br>
    <!-- <a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>">
    <img src="image/image_recettes/<?php  echo $donnees['image']; ?>" alt="recette" width="300" height="200">
    </a> -->
    <strong><a href="affiche_recette.php?id_recette=<?php  echo $donnees['id_recette']; ?>" class="nom_recette">
    <?php echo $donnees['nom_recette'];?>
    </a></strong>
    <p class="categorie_recette"><?php echo $donnees['categorie']; ?></p>
    <!-- <p><?php echo $donnees['cout']; ?> Temps de realisation:<?php  echo $donnees['temps_execution']; ?> regime:<?php  echo $donnees['regime']; ?> miam<?php  echo $donnees['note']; ?> </p> -->
</div>