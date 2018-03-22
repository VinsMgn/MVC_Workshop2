<?php

include_once "../model/helper.php";
//Récupére la variable session de la personne qui essaie d'accéder à la page
$auth = getAuth();
//Si la personne n'est pas connectée, on rentre dans la boucle
if($auth === FALSE){
    //Envoie une erreur dans les logs du site
    error_log("Utilisateur non authentifie");
    //Renvoie la personne vers la page login avec le code d'erreur "error" que l'on récupèrera dans la page "error_message"
    header("Location: login.php?error");
    exit (1);
}


