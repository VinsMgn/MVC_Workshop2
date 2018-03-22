<?php

include_once "../model/udepsi.php";
include_once "../html/new_user.php";

if(isset($_POST)){



    //Récupération des données
    $user_lname = htmlspecialchars($_POST['nom']);
    $user_fname = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $date_naissance = htmlspecialchars($_POST['datenaiss']);
    $numero = htmlspecialchars($_POST['tel']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdp = md5($mdp);
    

    //Connexion
    $bdd= getDataBase();

    //Requête SQL
    $stmt = $bdd->prepare ("INSERT INTO utilisateur (nom, prenom, pseudo, mail, date_naissance, num_tel, mdp) VALUES(:pnom, :pprenom, :ppseudo, :pmail, :pdatenaiss, :pnum_tel, :pmdp)");
    $stmt->bindParam(':pnom', $user_lname);
    $stmt->bindParam(':pprenom',$user_fname);
    $stmt->bindParam(':ppseudo', $pseudo);
    $stmt->bindParam(':pmail', $mail);
    $stmt->bindParam(':pdatenaiss',$date_naissance);
    $stmt->bindParam(':pnum_tel', $numero);
    $stmt->bindParam(':pmdp', $mdp);
    $nbInsert = $stmt->execute();

    header("Location: ../view/login.php");
}


