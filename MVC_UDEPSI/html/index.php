<!DOCTYPE html>
<HTML>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="library/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="library/script.js"></script>
</head>

<body>
       
    <?php include("header.php") ?>

    <div class="row main" style="margin-left=1vw !important">
        <div id="test"class="col-12" style="text-align: center">
            <div class="content-main">



<?php
require_once "../model/udepsi.php";
$bdd = getDataBase();
//Requête SQL pour voir tous les utilisateurs
if ($bdd) {
    $query = "SELECT * FROM Cours";
    // Exécution de la requête
    $resultat = $bdd->query($query);

    $pseudo = "anonymous";

// "tableau" valide ?
    if ($resultat) {
        // parcours du "tableau"
        $donnees = $resultat->fetch();
        // "donnees" valide ?
        if ($donnees) {
            // parcours du "tableau"
            while ($donnees) {
                // On affiche chaque entrée une à une

                if ($bdd) {
                    $query1 = "SELECT nom_competence FROM cours c, competence co WHERE c.id_competence=co.id_competence AND c.id_cours=".$donnees["id_cours"];
                    // Exécution de la requête
                    $resultat1 = $bdd->query($query1);

                    // "tableau" valide ?
                    if ($resultat1) {
                        // parcours du "tableau"
                        $donnees1 = $resultat1->fetch();
                        // "donnees" valide ?
                        if ($donnees1) {
                            // parcours du "tableau"
                            while ($donnees1) {
                                // On affiche chaque entrée une à une
                                $competence = $donnees1['nom_competence'];
                                $donnees1 = $resultat1->fetch();
                            }
                            // Fermeture de la ressource
                            
                        } else {
                            // Le tableau est vide : il n’y a aucun enregistrements
                        }
                    }
                }
                if ($bdd) {
                    $query2 = "SELECT DISTINCT pseudo FROM cours_propose c, utilisateur u WHERE c.id_cours=u.id_user AND c.id_cours=".$donnees["id_cours"];
                    // Exécution de la requête
                    $resultat2 = $bdd->query($query2);

                    // "tableau" valide ?
                    if ($resultat2) {
                        // parcours du "tableau"
                        $donnees2 = $resultat2->fetch();
                        // "donnees" valide ?
                        if ($donnees2) {
                            // parcours du "tableau"
                            while ($donnees2) {
                                // On affiche chaque entrée une à une
                                $pseudo = $donnees2['pseudo'];
                                $donnees2 = $resultat2->fetch();
                            }
                            // Fermeture de la ressource
                        } else {
                            // Le tableau est vide : il n’y a aucun enregistrements
                        }
                    }
                } ?>

                <div class="course">
                    <img class="course-tech" src="logo/<?=$competence?>.png"/> 
                    <div class="course-title">
                        <?=$donnees['titre_cours']?>
                    </div>
                    </br>
                    <div class="course-subtitle">
                        Par : <?=$pseudo?>
                    </div>
                    </br>
                    <div class="course-line">
                    </div>

                    <div class="course-desc">
                        <?=$competence?>
                        <?=$donnees['texte_cours']?>
                    </div>
                    <div class="course-line">
                    </div>
                    <div class="course_date">
                        Le <?=$donnees['date_cours']?> à <?=$donnees['horaire']?>
                    </div>
                    <a href="">
                        <div class="sinscrire">
                            Participer
                        </div> 
                    </a>
                </div>

                

                <?php

                $pseudo = "Anonymous";
                //Affichage des boutons de modif et de suppression

                // on récupère la ligne suivante
                $donnees = $resultat->fetch();
            }
            // Fermeture de la ressource
            $resultat->closeCursor();
            $resultat2->closeCursor();
            $resultat1->closeCursor();
        } else {
            // Le tableau est vide : il n’y a aucun enregistrements
            echo "Aucun résultat";
        }
    }
}


?>        

            </div>
        </div>
    </div>

    <div class="void">
    </div>
    
    <?php include("footer.php")?>

    </div>
    
    
    

    

    <!--
        360/640
        480/848
        720/1280
        1080/1920
    -->

</body>

</HTML>
