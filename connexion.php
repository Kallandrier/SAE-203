<?php
$page_active = "connexion";

require_once('./ressources/includes/connexion-bdd.php');

?>
<!DOCTYPE html>
<html>
<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administation SAÉ 203</title>

    <link rel="icon" href="ressources/images/favicon-GEC_400x400px.png" type="image/png">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/connexion.css">
</head>
<body>
    <?php require_once('./ressources/includes/header.php'); ?>
    <div class="login-container">
        <h2>Connexion Administrateur</h2>
        <form method="post" action="./administration/auteurs/index.php">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>
</html>
