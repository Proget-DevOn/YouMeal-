<?php

include("config.php");
include("ajout_ingredients.php");
global $conn;
if(count($_POST)>0){
  $key=array_keys($_POST);
  $val=array_values($_POST);
  for($i=0;$i<count($_POST);$i++)
  {
    //echo $key[$i];
    ${$key[$i]}=$val[$i];
  }
  echo $val[0];
    $nb_etape=count($_POST)-((int)$val[1]+2);
    //echo $nb_etape;
    $nb_ing=count($_POST)-((int)$val[2]+2);
    //echo $nb_ing;
    for ($j=1; $j <$nb_ing ; $j++) {
        $valeur=${"ingredient".(string)$j};
        $sql = "INSERT INTO ingredients(id_recette,nom_ingredient) VALUES ('".${"id_recette"}."','".$valeur."')";
        if(  $req=$conn->query($sql)==TRUE) {
            echo "reussi";
        }
        else{
        echo $sql;
        echo "il faut remplir tout les champs";
        }
      }
for ($e=1; $e <$nb_etape ; $e++) {

      $valeur=${"etape".$e};
      $sql2 = "INSERT INTO preparation(id_recette,description_etape) VALUES ('".$id_recette."','".$valeur."')";
      if(  $req2=$conn->query($sql2)==TRUE)
        {
          $dest="index.php";
            echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
    }
    else{
    echo $sql2;
    echo "il faut remplir tout les champs";
    }


  }
}


?>
