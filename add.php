<?php

  //Connexion à la base de données
  $bdd = mysqli_connect('localhost', 'root', 'root', 'forum');

  //Récuperation des paramètres
  $numerosujet = $_GET['numerosujet'];
  $redacteur = $_GET['redacteur'];
  $message = $_GET['message'];

  //Génération de la requête
  $requeteSQL = "INSERT INTO messages 
    VALUES (NULL, '$numerosujet', '$redacteur', '$message')";
  //Exécution de la requête
  $reponse = mysqli_query($bdd, $requeteSQL);
  //Affichage du resultat
  echo "Merci $redacteur. Vous venez de saisir : $message <br/>";

  // On renvoie vers la page principale
  header("Location: index.php?numerosujet=$numerosujet");