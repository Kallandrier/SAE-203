<?php
$couleur_bulle_classe = "bleu";
$page_active = "redaction";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL
$query = "SELECT * FROM auteur";
$requete = $clientMySQL->query($query);


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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php');
        require_once('./ressources/includes/bulle.php');
        ?>

<main class="container mx-auto px-4">
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php
        // Affichage des auteurs
        while ($auteur = $requete->fetch()) {
            echo '<li class="bg-rouge rounded-lg shadow p-4 transform text-center hover:opacity-75">';
            echo '<div class="flex justify-center mb-4">';
            echo '<img src="' . $auteur['lien_avatar'] . '" alt="Image de l\'auteur" class="h-200 rounded-full">';
            echo '</div>';
            echo '<p class="text-lg font-semibold mb-2">' . $auteur['prenom'] . ' ' . $auteur['nom'] . '</p>';
            echo '<div class="flex justify-between">';
            if (!empty($auteur['lien_twitter'])) {
                echo '<a href="' . $auteur['lien_twitter'] . '" class="text-blue-500 hover:underline mr-4">Compte Twitter</a>';
            }
            // Lien vers le compte Twitter de l'université
            echo '<a href="https://twitter.com/UniversiteCergy" class="text-blue-500 hover:underline">Compte Twitter de l\'université</a>';
            echo '</div>';
            echo '</li>';
                                }
        ?>
    </ul>
</main>

    <?php require_once('./ressources/includes/footer.php'); ?>
</section>


        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>


</html>
