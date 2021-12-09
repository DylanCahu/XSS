<html>
<head>
    <title>XSS</title>
</head>
<body>
<h1>Ajouter un message</h1>
    <form id="add" action="add.php" method="POST">
        Numéro du sujet : <input type="text" name="numerosujet"><br /> 
        Rédacteur : <input type="text" name="redacteur"><br /> 
        Message : <input type="text" name="message"><br />
        <input type="submit">
    </form>

    <h1>Chercher des messages</h1>
    <form id="search" action="index.php" method="POST">
        Sujet n° : <input type="text" name="numerosujet"><br />
        <input type="submit">
    </form>

    <h1>Se connecter</h1>
    <form id="connect" action="index.php" method="POST">
        Identifiant : <input type="text" name="identifiant"><br />
        Mot de passe : <input type="password" name="motdepasse"><br />
        <input type="submit">
    </form>

<?php
    //Connexion à la base de données
    $bdd = mysqli_connect('localhost', 'root', 'root', 'xss');

    // Si l'utilisateur s'est connecté
    if (isset($_POST['identifiant'])) {
        //Récupération des paramètres
        $identifiant = $_POST['identifiant'];
        $motdepasse = $_POST['motdepasse'];
        //Génération de la requête
        $requeteSQL = "SELECT role FROM comptes 
          WHERE identifiant = '$identifiant' AND motdepasse = PASSWORD('$motdepasse')";
        //Exécution de la requête
        $reponse = mysqli_query($bdd, $requeteSQL);
        $resultat = mysqli_fetch_assoc($reponse);
        //Affichage du résultat
        if (isset($resultat['role'])) {
            $role = $resultat['role'];
            echo "Vous êtes connecté en tant que '$role'.";
        } else {
            echo "Identifiant ou mot de passe incorrect.";
        }
    }

    if (isset($_POST['numerosujet'])) {
        //récupération des paramètres
        $numerosujet = $_POST['numerosujet'];

        //génération de la requête
        $requeteSQL = "SELECT * FROM messages 
          WHERE numerosujet='$numerosujet' order by id";

        //exécution de la requête
        $reponse = mysqli_query($bdd, $requeteSQL);

        //compter le nombre de lignes
        if ($reponse->num_rows > 0) {
            //affichage du résultat
            echo "<h1>Messages du sujet n°$numerosujet</h1> <h3>".$reponse->num_rows.")</h3></br> ";
            while ($resultat = mysqli_fetch_assoc($reponse)) {
                echo $resultat['redacteur'] . " : " . $resultat['message'] . "<br>";
            }
        }
    }
    ?>