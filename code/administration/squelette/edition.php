<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "REMPLACER";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);

$entite = null;
if ($entree_mise_a_jour) {
    $commande = $clientMySQL->prepare('SELECT * FROM TABLE WHERE id = :id');
    $commande->execute([
        "id" => $_GET["id"]
    ]);

    $entite = $commande->fetch();
}

if ($formulaire_soumis) {
    // On met à jour l'entrée
    $commande = $clientMySQL->prepare("
        UPDATE REMPLACER
        SET nom = :nom, prenom = :prenom, avatar = :avatar
        WHERE id = :id
    ");

    $commande->execute([
        "nom" => $_POST["nom"],
        "prenom" => "A REMPLACER",
        "avatar" => "A REMPLACER",
        "id" => $_POST["id"]
    ]);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Editeur REMPLACER - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4">
        <h1 class="text-3xl font-bold text-gray-900">Editer</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6">
            <div class="py-6">
            <?php if ($entite) { ?>
                    <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                        <section class="grid gap-6">
                            <input type="hidden" value="<?php echo $entite[
                                'id'
                            ]; ?>" name="id">
                            <div class="col-span-12">
                                <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                                <input type="text" value="<?php echo $entite[
                                    'nom'
                                ]; ?>" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom">
                            </div>
                            <div class="mb-3 col-md-6">
                                <button type="submit" class="font-bold rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Éditer</button>
                            </div>
                        </section>
                    </form>
                <?php } else { ?>
                    <!-- A compléter -->
                <?php } ?>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>


</html>