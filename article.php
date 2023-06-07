<?php
$couleur_bulle_classe = "violet";
$page_active = "article";

require_once('./ressources/includes/connexion-bdd.php');

// à adapter
$articleCommand = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
$articleCommand->execute([
    'id' => 2,
]);
$article = $articleCommand->fetch();

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
    <link rel="icon" href="ressources/images/favicon-GEC_400x400px.png" type="image/png">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/accueil.css">
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
          <!--  <h1 class="titre-page">< ?php echo $article["titre"]; ?>  </h1> -->
            <?php
            // Connexion à la base de données
            $connexion = new PDO("mysql:host=localhost;dbname=sae_203_db", "root", "");

            // Récupération des articles depuis la base de données
            $requete = $connexion->query("SELECT * FROM article");

            // Affichage des articles
            while ($article = $requete->fetch()) {
                echo "<h2>".$article['titre']."</h2>";
                echo "<p>".$article['contenu']."</p>";
                echo "<img src=".$article['image'].">";
                echo "<hr>";
            }

            // Fermeture de la connexion à la base de données
             $connexion = null;
        ?>

        </main>
        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>

</html>