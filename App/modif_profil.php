<?php
session_start();

if(!isset($_SESSION['login']))
{
  include('connexion.html');
  die('');
}
    include("config.php");
    global $conn;


if(isset($_POST['image'])||isset($_POST['bio'])){

  if($_POST['image']!==""){

      $sql1="UPDATE utilisateurs SET photo='".$_POST['image']."' WHERE pseudo='".$_SESSION['login']."'";
      $conn->query($sql1);
      echo "photo modifier";
    }

      if($_POST['bio']!==""){

        $sql2="UPDATE utilisateurs SET bio='".$_POST['bio']."' WHERE pseudo='".$_SESSION['login']."'";
        $conn->query($sql2);
        echo "bio modifier";
        }
        $dest="profil.php";



       echo '<script language="JavaScript">window.location=\'' . $dest.'\'</script>';
      }

  ?>
