<?php

// Le modèle
require ("../model/udepsi.php");

// On démarre les sessions
session_start();

// Le contrôleur

$competence = "";
$theme ="";

// Obtention des variables POST du formulaire de recherche
if (isset($_POST["competence"]) && isset ($_POST["theme"])) {
    $competence = htmlspecialchars($_POST["competence"]);
    $theme = htmlspecialchars($_POST["theme"]);
}

// Obtention de la liste
$competences = getCompetences($competence,$theme);


// La view
require ("../view/see_competences.php");

