<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 22/03/2018
 * Time: 11:23
 */
include_once "../model/helper.php";
include_once "../model/udepsi.php";
session_start();
// On récupère l'id de la compétence que l'utilisateur a sélectionné
$idcomp=getVar('id_competence');
$idstar=postVar('stars');
// On récupère son id utilisateur
$iduser=sessionVar('id');


if ($_GET && $idstar<10 && $idstar>0){
    // S'il y a une id_compétence présente dans l'url alors on lie l'id compétence avec son id utilisateur
    insertCompetenceProfile($idstar,$idcomp,$iduser);
    // On redirige l'utilisateur vers la même page avec l'extension de lien "ajoutvalide"
    header("Location: insert_comp.php?ajoutvalide");

    // On inclue le message d'erreur lié à cette extension de lien
    include_once "../controller/error_message.php";

}else{
    echo "impossible";
}
