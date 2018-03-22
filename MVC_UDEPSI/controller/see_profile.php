<?php
session_start ();
//Profil de Jo qui s'est connecté
require_once "../model/udepsi.php";
require_once "../controller/login_test.php";


$bdd=getDataBase();

$pseudo=$_SESSION['login'];
if($bdd){ //si on se connecte à la BD => récupération des données de l'utilisateur grâce à la variable $_Session
    if(isset($pseudo) && !empty($pseudo)){
        //Affichage des informations de l'utilisateur
        $query = "SELECT * FROM utilisateur WHERE pseudo = :ppseudo";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':ppseudo', $pseudo);
        $stmt->execute();
        $donnes = $stmt->fetch(PDO::FETCH_OBJ);
        echo"Votre nom : $donnes->nom";
        echo" Votre prénom : $donnes->prenom";
        echo " Votre pseudo : $donnes->pseudo\n \n";


        //Affichage des compétences de l'utilisateur
        $req="SELECT * FROM competence as c, competence_lvl as cl, utilisateur as u WHERE u.id_user=cl.id_user and cl.id_competence=c.id_competence";
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        $competence = $stmt->fetch(PDO::FETCH_OBJ);
        echo" Vous possédez des compétences en : $competence->nom_competence \n \n";


        //Affichage des cours au quel a participé l'utilisateur
        $req="SELECT * FROM cours as c, cours_participe as cp, utilisateur as u WHERE u.id_user=cp.id_user and cp.id_cours=c.id_cours";
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        $cours = $stmt->fetch(PDO::FETCH_OBJ);
        echo" Vous avez participez à des cours en : $cours->theme_cours\n \n";
    }
}





