<?php
//Profil de Jo qui s'est connecté
require_once "../model/udepsi.php";
require_once "../controller/login_test.php";

 
include("header.php");


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
        $_SESSION['id'] = $donnes->id_user;

        //Affichage des compétences de l'utilisateur
        $req="SELECT * FROM competence as c, competence_lvl as cl, utilisateur as u WHERE u.id_user=cl.id_user and cl.id_competence=c.id_competence";
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        $competence = $stmt->fetch(PDO::FETCH_OBJ);

        //Affichage des cours au quel a participé l'utilisateur
        $req="SELECT * FROM cours as c, cours_participe as cp, utilisateur as u WHERE u.id_user=cp.id_user and cp.id_cours=c.id_cours";
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        $cours = $stmt->fetch(PDO::FETCH_OBJ);
        
    }
}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="library/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="library/script.js"></script>
</head>

<body>

<div class="row">

    <div class="col-3">
    </div>

    <div class="col-6">
        <div class="display_profile">
                <?php // echo '<img src="avatar/'.$donnees->path.'"/ alt="avatar utilisateur" class="avatar_utilisateur">'; ?>
                <img src="img/hayden.jpg" class="avatar_utilisateur">
                <p class="info_utilisateur">
                    Nom : <b><?=$donnes->nom;?></b> <br/>
                    Prénom : <b><?=$donnes->prenom?></b> <br/>
                    Pseudo : <b><?=$donnes->pseudo?></b> <br/>
                </p>
                </br>
              
                <div class="competences_utilisateur">
                    Compétences : </br>
                    <div class="competence">
                        <span class="nom_compétence"><?=$competence->nom_competence?>
                    </div>
                    <div class="competence">
                        <span class="nom_compétence"><?=$competence->nom_competence?>
                    </div>
                    <div class="competence">
                        <span class="nom_compétence"><?=$competence->nom_competence?>
                    </div>
                    <div class="competence">
                        <span class="nom_compétence"><?=$competence->nom_competence?>
                    </div>
                </div>
                <div class="cours_utilisateur">
                    Cours : <?=$cours->theme_cours?> <br/>
                </div>
        </div>
    </div>

    <div class="col-3">
    </div>

        </div>
        <div class="void">
    </div>

    <?php include("footer.php")?>

    
    
</body>

</html>
