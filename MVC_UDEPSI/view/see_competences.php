<?php

include_once "../model/helper.php";
include "../controller/error_message.php";
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <h1> Quelle compétence possédez-vous ?</h1>
    <form action="" method="post" class="form-inline">
        <div class="form-group">
            <label for="competence">Compétences :</label>
            <select id="competence" name="competence" class="form-control">
                <option value="" <?php if (empty($competence)) {
                    echo "selected";
                } ?>>Tous
                </option>
                <?php
                // On obtient la liste des compétences
                $listeCompName = getUniqueCompetenceName();
                // Pour chaque compétence on présente son nom dans le menu déroulant
                foreach ($listeCompName as $ligne) {
                    echo "<option value='$ligne->nom_competence'" . ($competence == $ligne->nom_competence ? "selected" : "") . ">$ligne->nom_competence</option>";
                }
                ?>
            </select>
            <label for="theme">Thèmes :</label>
            <select id="theme" name="theme" class="form-control">
                <option value="" <?php if (empty($theme)) {
                    echo "selected";
                } ?>>Tous
                </option>
                <?php
                $listeCompTheme = getUniqueCompetenceTheme();
                foreach ($listeCompTheme as $ligne) {
                    echo "<option value='$ligne->theme'" . ($competence == $ligne->theme ? "selected" : "") . ">$ligne->theme</option>";
                }

                ?>
            </select>
        </div>

        <input type="submit" value="Rechercher" class="btn btn-default"/>
    </form>

    <div class="row">
        <?php
        // S'il existe des compétences, on va toutes les afficher en suivant la structure suivante ci-dessous
        if ($competences) {
            foreach ($competences as $competence) {
                // On affiche chaque entrée une à une
                ?>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><?= $competence->theme ?></h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">

                                    <span><?= $competence->nom_competence ?></span>

                                    <!-- Si l'utilisateur appuie sur le bouton Ajouter, on va envoyer l'id de la compétence dans le lien ce qui va nous permettre
                                    de la récupérer plus tard pour lier l'id compétence et l'id utilisateur-->
                                    <input type="hidden" name="id_competence" value="<?= $idComp = $competence->id_competence ?>">
                                    <form action="../controller/add_comp_profile.php?id_competence=<?php echo $idComp ?>" method="post">
                                    <input type="text" name="stars" placeholder="Note" >/10
                                    <input type="submit" class="btn" value="Ajouter">
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php
            }
        } else {
            echo "<tr><td colspan='3'>Aucun résultat</td></tr>";
        }
        ?>

    </div>
</body>

</html>
