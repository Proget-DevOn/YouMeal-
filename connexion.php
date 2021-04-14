<?php
include("config.php");

$pseudo=$_POST['pseudo'];
$password=$_POST['password'];
$pass=$conn->query("SELECT password FROM utilisateurs WHERE pseudo = '".$pseudo."'");
$rows = $pass->fetchAll();

if(password_verify($password, $rows[0]['password'])){
      if (!session_id()){
        session_start();
        $_SESSION['login'] = $pseudo;

        $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous êtes connecté';
        $dest="index.php";
        echo $message;
        echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
      exit;
      }

include('connexion.html');
include('footer.html');
?>
