<?php
require_once ('../../ressources/includes/connexion-bdd.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];

    if(isset($_POST["confirmation"]) && $_POST["confirmation"] === "yes") {
        // Suppression de l'élément
        $suppression = $clientMySQL->prepare("DELETE FROM article WHERE id= ?");
        $suppression->execute(array($id));

        header('location: http://sae203/administration/articles/');
        exit();
    } elseif (isset($_POST["confirmation"]) && $_POST["confirmation"] === "no") {
        // Redirection vers la page des auteurs
        header('location: http://sae203/administration/articles/');
        exit();
    }

    // Affichage de la confirmation de suppression avec CSS
    echo '
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #1a202c;
            }

            .confirmation-form {
                background-color: #FFFFFF;
                border: 1px solid #CCCCCC;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .confirmation-form p {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .confirmation-form .btn-wrapper {
                margin-top: 20px;
                text-align: center;
            }

            .confirmation-form .btn-wrapper button {
                background-color: #DC3545;
                color: #FFFFFF;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                margin-right: 10px;
            }

            .confirmation-form .btn-wrapper a {
                text-decoration: none;
                color: #333333;
                font-size: 16px;
            }

            .confirmation-form .btn-wrapper a:hover {
                text-decoration: underline;
            }
        </style>

        <form method="POST" action="" class="confirmation-form ">
            <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
            <input type="hidden" name="confirmation" value="yes">
            <input type="hidden" name="id" value="' . $id . '">
            <div class="btn-wrapper">
                <button type="submit">OUI</button>
                <a href="http://sae203/administration/articles/">NON</a>
            </div>
        </form>
    ';
}
?>
