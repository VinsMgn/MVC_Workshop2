<!DOCTYPE html>
<html>
<head>
    <title>Edition d'un utilisateur</title>
    <?php require_once "../model/udepsi.php";?>
</head>

<body>
<h2>Edition d'un utilisateur</h2>

<?php
// On regarde comment a été appellé la page
$user_id = -1;

$alertCSS = "success";
$alertMessage = "";

// 1 : Connexion à la BD
$bdd = getDataBase();

if (isset($_GET) && count($_GET) > 0)
{
    // L'utilisateur a cliqué sur le lien a href
    // 2 - On récupère l'id
    if (isset($_GET['id']))
    {
        $user_id = htmlspecialchars($_GET['id']);
            // La bd est-elle valide ?
            if ($bdd) {
                // connexion réussie
                // 3 - On récupère toutes les données de l'utilisateur
                $query = "SELECT * FROM utilisateur WHERE id_user = :pId";
                $stmt = $bdd->prepare($query);
                $stmt->bindParam(':pId', $user_id);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if (!$user) {
                    $user_id = -1;
                }
            }
        else {
            $user_id = -1;
        }
    }

    // l'utlisateteur vient-il de la page "updatePublisher.php" ?
    if (isset($_GET['req']) && is_numeric($_GET['req'])) {
        if (intval($_GET['req']) == 1) {
            $alertCSS = "success";
            $alertMessage = "La mise à jour a résussie.";
        }
        else if (intval($_GET['req']) == 0) {
            $alertCSS = "danger";
            $alertMessage = "La mise à jour a échoué.";
        }
    }
}

if (! empty($alertMessage)) {
    ?>
    <div class="alert alert-<?= $alertCSS ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alertMessage ?>
    </div>
    <?php
}
?>


<br />
<br />

<?php
if ($user_id == -1) {
    ?>
    <p>L'utilisateur n'existe pas dans la base de données</p>
    <?php
}
else {
    ?>
    <form action="../controller/updateUser.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom de l'utilisateur</label>
            <input type="text" class="form-control" name="nom" placeholder="Entrez le nom de l'utilisateur" value="<?= $user->nom ?>" />
        </div>
        <div class="form-group">
            <label for="city">Prénom</label>
            <input type="text" class="form-control" name="prenom" placeholder="Entrez le prénom de l'utilisateur" value="<?= $user->prenom ?>" />
        </div>
        <div class="form-group">
            <label for="state">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" placeholder="Entrez le pseudo de l'utilisateur" value="<?= $user->pseudo ?>" />
        </div>
        <input type="hidden" name="id_user" value="<?php echo $user_id ?>" />

        <input type="submit" value="Valider" class="btn btn-primary" />

    </form>
    <?php
}
?>
<br><br>
<a href="list_user.php">Retour à la liste</a>
</body>
</html>