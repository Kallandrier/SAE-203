<?php
require_once('../../ressources/includes/connexion-bdd.php');

// A adapter
$commande = $clientMySQL->prepare('SELECT * FROM TABLE');
$commande->execute();
$liste = $commande->fetchAll();

$pageCourante = "REMPLACER";
$racineURL = $_SERVER['REQUEST_URI'];

$URLCreation = "{$racineURL}/creation.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Liste A REMPLACER  - Administration</title>
</head>

<body>
    <?php include_once("../ressources/includes/menu-principal.php"); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 justify-between flex">
            <h1 class="text-3xl font-bold text-gray-900">Liste A REMPLACER</h1>
            <a href="<?php echo $URLCreation ?>" class="block font-bold rounded-md bg-indigo-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Ajouter un nouvel auteur</a>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6">
            <div class="py-6">
                <table class="w-full bg-white rounded-lg overflow-hidden border-collapse shadow">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="font-bold pl-8 py-5 text-left">Id</th>
                            <th class="font-bold pl-8 py-5 text-left"></th>
                            <th class="font-bold pl-8 py-5 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($liste as $element) {
                                $lienEdition = "{$racineURL}/edition.php?id={$element["id"]}";
                        ?>
                            <tr class="hover:bg-gray-100 border-b-2 border-b-gray-100 last:border-b-0 first:border-t-2 first:border-t-gray-200">
                                <td class="pl-8 p-4 font-bold"><?php echo $element["id"]; ?></td>
                                <td class="pl-8 p-4"></td>
                                <td class="pl-8 p-4">
                                    <a href='<?php echo $lienEdition; ?>' class='link-primary'>Modifier</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>