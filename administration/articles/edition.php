<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);

$editsuccess;
$editfail;

$article = null;
if ($entree_mise_a_jour) {
    // On cherche l'article à éditer
    $chercherArticlecommande = $clientMySQL->prepare(
        'SELECT * FROM article WHERE id = :id'
    );
    $chercherArticlecommande->execute([
        "id" => (int) $_GET["id"]
    ]);

    $article = $chercherArticlecommande->fetch();
}

if ($formulaire_soumis) {
    // On crée un nouvel article
    $majArticlecommande = $clientMySQL->prepare("
        UPDATE article
        SET titre = :titre, chapo = :chapo, date_creation = :date_creation, auteur_id = :auteur_id, contenu = :contenu
        WHERE id = :id
    ");

    $majArticlecommande->execute([
        "titre" => $_POST["titre"],
        "chapo" =>  $_POST["chapo"],
        "contenu" =>  $_POST["contenu"],
        "date_creation" =>  $_POST["date_creation"],
        "auteur_id" =>  $_POST["auteur_id"],
        "id" => $_POST["id"],
    ]);
    if($majArticlecommande->rowCount()>0){
        $editsuccess="Édition réussite !";
    }
    else{
        $editfail="Erreur d'édition !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Editer article - Administration</title>
</head>

<body>
<?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Editer Article</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="mb-4 col-md-6">
            <a href="http://sae203/administration/articles/" class="font-bold rounded-md bg-red-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-red-900 relative right">Retour</a>
            </div>
            <?php
                if (isset($editsuccess)) {
                    echo "<section class='font-sans font-normal text-lg font-medium text-white rounded-lg bg-green-700 p-2 border-1 text-center transition-all duration-500 transform hover:scale-105'> $editsuccess </section>";
                } elseif (isset($editfail)) {
                    echo "<section class='font-sans font-normal text-lg font-medium text-white rounded-lg bg-red-800 p-2 border-1 text-center transition-all duration-500 transform hover:scale-105'> $editfail </section>";
                }
            ?>
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                <section class="grid gap-6">
                            <input type="hidden" value="<?php echo $article[
                                'id'
                            ]; ?>" name="id">
                            <div class="col-span-12">
                                <label for="id" class="block text-lg font-medium text-gray-700">Id</label>
                                <input type="text" value="<?php echo $article[
                                    'id'
                                ]; ?>" name="id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="id">
                            </div>
                            <div class="col-span-12">
                                <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                                <input type="text" value="<?php echo $article[
                                    'titre'
                                ]; ?>" name="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="titre">
                            </div>
                            <div class="col-span-12">
                                <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                                <input type="text" value="<?php echo $article[
                                    'chapo'
                                ]; ?>" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo">
                            </div>
                            <div class="col-span-12">
                                <label for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                                <input type="text" value="<?php echo $article[
                                    'contenu'
                                ]; ?>" name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu">
                            </div>
                            <div class="col-span-12">
                                <label for="date_creation" class="block text-lg font-medium text-gray-700">Date de création</label>
                                <input type="date" value="<?php echo $article[
                                    'date_creation'
                                ]; ?>" name="date_creation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="date_creation">
                            </div>
                            <div class="col-span-12">
                                <label for="auteur_id" class="block text-lg font-medium text-gray-700">Auteur</label>
                                <input type="text" value="<?php echo $article[
                                    'auteur_id'
                                ]; ?>" name="auteur_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="auteur_id">
                            </div>
                            <div class="mb-3 col-md-6">
                                <button type="submit" class="font-bold rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Éditer</button>
                            </div>
                        </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>