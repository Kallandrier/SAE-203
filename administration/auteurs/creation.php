<?php
require_once '../../ressources/includes/connexion-bdd.php';

$pageCourante = 'auteurs';

$formulaire_soumis = !empty($_POST);

$creationsuccess;
$creationfail;

if ($formulaire_soumis) {
    if (
        isset(
            $_POST['prenom'],
            $_POST['nom'],
            $_POST['lien_avatar'],
            $_POST['lien_twitter']
        )
    ) {
        // On crée une nouvelle entrée
        $creerAuteurCommande = $clientMySQL->prepare(
            'INSERT INTO auteur(prenom, nom, lien_avatar,lien_twitter) VALUES (:prenom, :nom, :lien_avatar, :lien_twitter)'
        );

        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $lienAvatar = htmlentities($_POST['lien_avatar']);
        $lienTwitter = htmlentities($_POST['lien_twitter']);

        $creerAuteurCommande->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'lien_avatar' => $lienAvatar,
            'lien_twitter' => $lienTwitter,
        ]);
        if($creerAuteurCommande->rowCount()>0){
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
    <?php require_once('../ressources/includes/head.php'); ?>

    <title>Creation auteur - Administration</title>
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Créer un auteur</h1>
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
                    <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nom" required>
                </div>
                <div class="col-span-12">
                    <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
                    <input type="text" name="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom" required>
                </div>
                <div class="col-span-12">
                    <label for="avatar" class="block text-lg font-medium text-gray-700">Lien avatar</label>
                    <input type="text" name="lien_avatar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="avatar">
                <div class="text-sm text-gray-500">
                    Mettre l'URL de l'avatar (chemin absolu)
                </div>
                </div>
                <div class="col-span-12">
                    <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Lien twitter</label>
                    <input type="url" name="lien_twitter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_twitter">
                </div>
                <div class="mb-3 col-md-6">
                    <button type="submit" class="font-bold rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer</button>
                </div>
            </section>
        </form>
        </div>
        </div>
    </main>
<?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>