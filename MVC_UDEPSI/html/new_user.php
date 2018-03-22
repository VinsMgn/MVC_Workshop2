<!DOCTYPE html>
<HTML>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="library/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<?php include("header.php")?>

<div class="row">

    <div class="col-3">
    </div>

    <div class="col-6">
        <div class="register_form">
            <p class="register_title"> Enregistrement </p>
            
            <form class="" method="post" action="../controller/insert_user.php">
                <p>
                    <label for="nom">Votre nom :</label> <br/>
                    <input type="text" name="nom" id="nom">
                </p>
                <p>
                    <label for="prenom">Votre prénom :</label> <br/>
                    <input type="text" name="prenom" id="prenom"></p>
                <p>
                    <label for="mail">Votre mail :</label> <br/>
                    <input type="email" name="mail" id="mail">
                </p>
                <p>
                    <label for="datenaiss"> Votre date de naissance :</label> <br/>
                    <input type="date" name="datenaiss" id="datenaiss">

                </p>

                <p>
                    <label for="tel"> Votre numéro de téléphone :</label> <br/>
                    <input type="text" name="tel" id="tel">

                </p>

                <p>
                    <label for="pseudo">Votre pseudo :</label> <br/>
                    <input type="text" name="pseudo" id="pseudo">
                </p>
                <p>
                    <label for="mdp"> Choisissez un mot de passe :</label> <br/>
                    <input type="password" name="mdp" id="mdp">
                </p>
                <br/>
                <input class="form_btn" type="submit">
            </form>
        </div>
    </div>

    <div class="col-3">
    </div>
</div>
<div class="void">

</div>

<?php include("footer.php") ?>

</div>

</HTML>
