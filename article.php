<?php
$couleur_bulle_classe = "violet";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

// à adapter
$articlesCommand = $clientMySQL->query('SELECT article.*, auteur.nom, auteur.prenom FROM article LEFT JOIN auteur ON article.auteur_id = auteur.id');
// Vérifie si l'ID de l'article est présent dans l'URL
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // Requête pour récupérer l'article correspondant à l'ID
    $articleCommande = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
    $articleCommande->bindParam(':id', $articleId);
    $articleCommande->execute();
    $article = $articleCommande->fetch();

    // Vérifie si un article a été trouvé avec l'ID spécifié
    if ($article) {
        $articleTitre = $article['titre'];
        $articleContenu = $article['contenu'];
    } else {
        // Redirige vers la page d'accueil si aucun article n'est trouvé avec l'ID spécifié
        header('Location: index.php');
        exit();
    }
} else {
    // Redirige vers la page d'accueil si l'ID de l'article est manquant
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/accueil.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php
        // A supprimer si vous n'en avez pas besoin.
        // Mettre une couleur dédiée pour cette bulle si vous gardez la bulle
        require_once('./ressources/includes/bulle.php');
        ?>

        <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
        <main class="conteneur-principal conteneur-1280">
            
        <?php

        
// Vérifie si l'ID de l'article est présent dans l'URL
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // Requête pour récupérer l'article correspondant à l'ID
    $articleCommande = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
    $articleCommande->bindParam(':id', $articleId);
    $articleCommande->execute();
    $article = $articleCommande->fetch();

    // Vérifie si un article a été trouvé avec l'ID spécifié
    if ($article) {
        // Affiche le contenu de l'article
        echo "<article>";
        echo "<h1 class='titre-page'>" . $article['titre'] . "</h1>";
        echo "<div>";
        echo "<p>" . $article['chapo'] . "</p>";
        echo "<p>" . $article['contenu'] . "</p>";
        echo "</div>";
        echo "<img src='" . $article['image'] . "' alt='Image de l'article'>";
        echo "<p>Date de création : " . $article['date_creation'] . "</p>";
        if (isset($article['auteur_id'])) {
            $auteurId = $article['auteur_id'];
        
            // Requête pour récupérer les informations de l'auteur
            $auteurCommande = $clientMySQL->prepare('SELECT * FROM auteur WHERE id = :id');
            $auteurCommande->bindParam(':id', $auteurId);
            $auteurCommande->execute();
            $auteur = $auteurCommande->fetch();
        
            // Vérifie si l'auteur a été trouvé
            if ($auteur) {
                echo "<p>Auteur : " . $auteur['nom'] . ' ' . $auteur['prenom'] . "</p>";
            } else {
                echo "<p>Auteur inconnu</p>";
            }
        } else {
            echo "<p>Auteur inconnu</p>";
        }
        

        echo "</article>";
    } else {
        // Affiche un message si aucun article n'est trouvé avec l'ID spécifié
        echo "<p>Aucun article trouvé.</p>";
    }
} else {
    // Affiche un message si l'ID de l'article est manquant
    echo "<p>ID de l'article manquant.</p>";
}
?>

        </main>
        
        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>


</html>
