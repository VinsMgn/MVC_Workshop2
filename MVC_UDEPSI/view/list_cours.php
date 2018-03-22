<?php
/**
 * Created by PhpStorm.
 * User: matteo.calmes
 * Date: 21/03/2018
 * Time: 12:29
 */

require_once "../model/udepsi.php";

//Connexion à la BD
$bdd = getDataBase();

//Requête SQL pour voir tous les utilisateurs
if ($bdd) {
    $query = "SELECT * FROM Cours";
    // Exécution de la requête
    $resultat = $bdd->query($query);

// "tableau" valide ?
    if ($resultat) {
        // parcours du "tableau"
        $donnees = $resultat->fetch();
        // "donnees" valide ?
        if ($donnees) {
            // parcours du "tableau"
            while ($donnees) {
                // On affiche chaque entrée une à une

                echo "Le cours du " . $donnees["date_cours"] . '</br>';
                echo " a " . $donnees['horaire'] . '</br>';
                echo "portera sur du  ";
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
                                echo $donnees1['nom_competence']."</br><br>";
                                $donnees1 = $resultat1->fetch();
                            }
                            // Fermeture de la ressource
                            $resultat1->closeCursor();
                        } else {
                            // Le tableau est vide : il n’y a aucun enregistrements
                            echo "Aucun résultat"."</br><br>";
                        }
                    }
                }
                echo " Description : " . $donnees['texte_cours'] . "</br><br>";
                echo "donnée par ";
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
                                echo $donnees2['pseudo']."</br><br>";
                                $donnees2 = $resultat2->fetch();
                            }
                            // Fermeture de la ressource
                            $resultat2->closeCursor();
                        } else {
                            // Le tableau est vide : il n’y a aucun enregistrements
                            echo "celui dont on ne doit pas prononcer le nom"."</br><br>";
                        }
                    }
                }

                //Affichage des boutons de modif et de suppression

                // on récupère la ligne suivante
                $donnees = $resultat->fetch();
            }
            // Fermeture de la ressource
            $resultat->closeCursor();
        } else {
            // Le tableau est vide : il n’y a aucun enregistrements
            echo "Aucun résultat";
        }
    }
}
?>

<a href="../html/new_cours.php"> Ajouter un cours</a>
