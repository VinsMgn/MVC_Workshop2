<?php
include_once "../model/udepsi.php";
include_once "../model/helper.php";
//On récupère les informations du formulaire de connexion
$login=postVar("login");
$mdp=postVar("mdp");
$mdp=md5($mdp); //MDP crypté à comparer avec celui dans la BD pour confirmer la connexion
//On vérifie l'existence du compte dans la base de données et s'il a bien saisi le bon login et le bon mot de passe
$userObject=authenticateUser($login,$mdp);
//Si il existe on lui met le statut connecté par le booléen $connected
if($userObject){
    $connected = true;
}else{
    $connected = false;
}
//Si l'utilisateur est connecté on rentre dans la condition if
if ($connected){
    // On démarre sa session utilisateur
    session_start ();
    $_SESSION['login']=$login;
    $_SESSION['mdp']=$mdp;
    // On stocke le fait qu'il soit connecté dans la variable "usertype" de sa session
    $_SESSION['usertype'] = $connected;
    // On le renvoie vers sa page d'accueil utilisateur
    header("Location: see_profile.php");
}/*else{
    // Si l'utilisateur n'est pas connecté on le renvoie vers la page de connexion avec le code d'erreur "error_login"
    header("Location: ../login.php?error_login");
}*/
?>
