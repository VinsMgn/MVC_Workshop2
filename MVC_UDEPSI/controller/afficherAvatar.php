<?php
require_once "../model/udepsi.php";
$bdd = getDataBase();

$id = $_SESSION['id'];

if ($bdd) {

    $req ="SELECT path FROM avatar as a, avatar_user as a_u , utilisateur as u WHERE a.id_avatar=a_u.id_avatar AND u.id_user=a_u.id_u";
    $resultat = $bdd->query($req);
    if ($resultat) {
        // parcours du tableau
        $donnees = $resultat->fetch();
        // "donnees" valide ?
        if ($donnees) {
            $perso = $donnees["path"];
        }
    }
    $req ="SELECT path FROM stuff as s, avatar_user as a_u , utilisateur as u WHERE s.id_stuff=a_u.id_s AND u.id_user=a_u.id_u";
    $resultat = $bdd->query($req);
    if ($resultat) {
        // parcours du tableau
        $donnees = $resultat->fetch();
        // "donnees" valide ?
        if ($donnees) {
            $stuff = $donnees["path"];
        }
    }
}