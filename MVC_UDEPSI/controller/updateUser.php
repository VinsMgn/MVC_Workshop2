<?php

require_once "../model/udepsi.php";

if (isset($_POST) && count($_POST) > 0) {
    //On récupère les données du formulaire
    extract(array_map("htmlspecialchars", $_POST));

    // On enregistre toutes les données de l'éditeur
    $bdd = getDataBase();
    $nbModifs = 0;
    // Mise à jour dans la bd
    $stmt = $bdd->prepare("UPDATE utilisateur SET nom=:pnom,  prenom=:pprenom, pseudo=:ppseudo WHERE id_user=:puserId");
    $stmt->bindParam(':pnom', $nom);
    $stmt->bindParam(':pprenom', $prenom);
    $stmt->bindParam(':ppseudo', $pseudo);
    $stmt->bindParam(':puserId', $id_user);
    //var_dump($nom, $prenom, $pseudo,$id_user);
    $nbModifs = $stmt->execute();

    header("Location: edit_user.php?id=".$id_user."&req=".$nbModifs);
}


