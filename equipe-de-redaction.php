<?php
$couleur_bulle_classe = "bleu";
$page_active = "redaction";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipe de rédaction - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">
    <link rel="icon" href="ressources/images/favicon-GEC_400x400px.png" type="image/png">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/equipe-de-redaction.css">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php');
        require_once('./ressources/includes/bulle.php');?>
        <?php
        ?>

        <main class="conteneur-principal conteneur-1280">
            <!-- Vous allez principalement écrire votre code HTML dans cette balise -->
        </main>
        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>

</html>