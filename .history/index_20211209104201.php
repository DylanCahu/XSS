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