<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);

$creationsuccess;
$creationfail;

if ($formulaire_soumis) {
    if (
        isset(
            $_POST['id'],
            $_POST['titre'],
            $_POST['chapo'],
            $_POST['date_creation'],
            $_POST['auteur_id']
        )
    ) {
        // On crée une nouvelle entrée
        $creerArticlecommande = $clientMySQL->prepare(
            'INSERT INTO article(id, auteur_id, titre, chapo, date_creation) VALUES (:id, :auteur_id, :titre, :chapo, :date_creation)'
             );

             $id = htmlentities($_POST['id']);
             $titre = htmlentities($_POST['titre']);
             $chapo = htmlentities($_POST['chapo']);
             $date_creation = new DateTimeImmutable();
             $auteur_id =  htmlentities($_POST['auteur_id']);

        $creerArticlecommande->execute([
            'id' => $id,
            'titre' => $titre,
            'chapo' => $chapo,
            'date_creation' => $date_creation->format('Y-m-d H:i:s'),
            'auteur_id' => $auteur_id,
        ]);
        if($creerArticlecommande->rowCount()>0){
            $creationsuccess="Creation réussite !";
        }
        else{
            $creationfail="Erreur de création !";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Création Article - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Créer un article</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="mb-4 col-md-6">
            <a href="http://sae203/administration/articles/" class="font-bold rounded-md bg-red-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-red-900 relative right">Retour</a>
        </div>
        <?php
            if (isset($creationsuccess)) {
                echo "<section class='font-sans font-normal text-lg font-medium text-white rounded-lg bg-green-700 p-2 border-1 text-center transition-all duration-500 transform hover:scale-105'> $creationsuccess </section>";
            } elseif (isset($creationfail)) {
                 echo "<section class='font-sans font-normal text-lg font-medium text-white rounded-lg bg-red-800 p-2 border-1 text-center transition-all duration-500 transform hover:scale-105'> $creationfail </section>";
            }
        ?>
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="id" class="block text-lg font-medium text-gray-700">Id</label>
                            <input type="text" name="id" id="id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre" id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div class="col-span-12">
                            <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo" required></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="date_creation" class="block text-lg font-medium text-gray-700">Date de création</label>
                            <input type="date" name="date_creation" id="date_creation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div class="col-span-12">
                            <label for="auteur_id" class="block text-lg font-medium text-gray-700">Auteur</label>
                            <input type="number" name="auteur-id" id="auteur-id"placeholder="Id de l'utilisateur">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>
