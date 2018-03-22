<?php
require_once "../model/udepsi.php";

if (isset($_POST) && count($_POST) > 0) {

    // L'utilisateur a cliqué sur le bouton supprimer

    // 1 - On récupère l'id du formulaires
    $user_id = htmlspecialchars($_POST['id_user']);
    // 2 : Connexion
    $bdd = getDataBase();
    $nbModifs = 0;

    // Suppression dans la bd
    $stmt = $bdd->prepare ("DELETE FROM utilisateur WHERE id_user=:pId");
    $stmt->bindParam(':pId', $user_id);
    $nbModifs = $stmt->execute();

    if ($nbModifs == 0) {
        header("Location: delete_users.php?req=0");
    }
    else {
        header("Location: ../view/list_user.php");
    }
}
?>