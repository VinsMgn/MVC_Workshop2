<?php
/**
 * Created by PhpStorm.
 * User: matteo.calmes
 * Date: 21/03/2018
 * Time: 11:13
 */

include_once "../model/udepsi.php";
include_once "../html/new_cours.php";



if(isset($_POST['datecours']) && !empty($_POST['datecours'])
      &&($_POST['horaire']) && !empty($_POST['horaire'])
      &&($_POST['texte_cours']) && !empty($_POST['texte_cours'])
      &&($_POST['competence']) && !empty($_POST['competence'])){

    session_start();
    //Récupération des données
    $date_cours = htmlspecialchars($_POST['datecours']);
    $horaire = htmlspecialchars($_POST['horaire']);
    $texte = htmlspecialchars($_POST['texte_cours']);
    $competence = htmlspecialchars($_POST['competence']);


    //Connexion
    $bdd= getDataBase();

    //Requête SQL
    $stmt = $bdd->prepare ("INSERT INTO cours (date_cours, horaire, texte_cours, id_competence) VALUES(:pdate, :phoraire, :ptexte, :pcompetence)");
    $stmt->bindParam(':pdate', $date_cours);
    $stmt->bindParam(':phoraire',$horaire);
    $stmt->bindParam(':ptexte', $texte);
    $stmt->bindParam(':pcompetence', $competence);

    $nbInsert = $stmt->execute();

    $query = "SELECT id_cours, id_user FROM cours, utilisateur WHERE date_cours='".$date_cours."' AND horaire='" . $horaire . "' AND texte_cours='" . $texte . "' AND id_competence='" . $competence . "'";

    $resultat = $bdd->query($query);
    $donnees = $resultat->fetch();
    var_dump($donnees);
    $stmt2 = $bdd->prepare("INSERT INTO cours_propose (id_c,id_u) VALUES(:pidc, :pidu)");
    $stmt2->bindParam(':pidc', $donnees["id_cours"]);
    $stmt2->bindParam(':pidu', $donnees["id_user"]);
    $stmt2->execute();
    $resultat->closeCursor();

    header("Location: ../view/list_cours.php");

} else {
    echo 'Vous avez mal saisie les informations nécessaires a la création d\'un cours veuillez recommencer pensez bien a remplir tout les champs';
}

header("Location: ../view/list_cours.php");