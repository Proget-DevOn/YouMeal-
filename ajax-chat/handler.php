<?php

/**
 * Connexion simple à la base de données via PDO !
 */
include("config.php");

/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "write"){
  postMessage();
} else {
  getMessages();
}

/**
 * Si on veut récupérer, il faut envoyer du JSON
 */
function getMessages(){
  global $conn;

  // 1. On requête la base de données pour sortir les 20 derniers messages
  $resultats = $conn->query("SELECT * FROM messages ORDER BY date_message DESC LIMIT 20");
  // 2. On traite les résultats
  $messages = $resultats->fetchAll();
  // 3. On affiche les données sous forme de JSON
  echo json_encode($messages);
}
/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 */
function postMessage(){
  global $conn;
  // 1. Analyser les paramètres passés en POST (author, content)
  
  if(!array_key_exists('Pseudo_emeteur', $_POST) || !array_key_exists('message', $_POST)){

    echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
    return;

  }

  $author = $_POST['Pseudo_emeteur'];
  $content = $_POST['message'];

  // 2. Créer une requête qui permettra d'insérer ces données
  $query = $conn->prepare('INSERT INTO messages SET Pseudo_emeteur = :Pseudo_emeteur, message = :message, created_at = NOW()');

  $query->execute([
    "Pseudo_emeteur" => $author,
    "message" => $content
  ]);

  // 3. Donner un statut de succes ou d'erreur au format JSON
  echo json_encode(["status" => "success"]);
}
/**
 * Voilà c'est tout en gros.
 */