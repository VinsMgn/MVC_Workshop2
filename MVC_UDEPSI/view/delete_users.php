<!DOCTYPE html>
<html>
<head>
    <title>Suppression d'un utilisateur</title>
    <?php require_once "../model/udepsi.php"; ?>
</head>

<body>
<h2>Suppression d'un utilisateur</h2>

<?php
$user_id = -1;
$user = null;

if (isset($_GET) && count($_GET) > 0) {
    // L'utilisateur a cliqué sur le lien a href
    // 1 - On récupère l'id
    if (isset($_GET['id'])) {
        $user_id = htmlspecialchars($_GET['id']);
        // 2 : Connexion à la BD
        $bdd = getDataBase();
        // La bd est-elle valide ?
        if ($bdd) {
            // connexion réussie
            // 3 - On récupère toutes les données de l'éditeur
            $query = "SELECT * FROM utilisateur WHERE id_user = :pId";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(':pId', $user_id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
        }

    }

    // l'utlisateteur vient-il de la page "deleteUser.php" ?
    if (isset($_GET['req']) && is_numeric($_GET['req'])) {
        if (intval($_GET['req']) == 1) {
            $alertCSS = "success";
            $alertMessage = "La suppression a résussie.";
        } else if (intval($_GET['req']) == 0) {
            $alertCSS = "danger";
            $alertMessage = "La suppression a échoué.";
        }
    }
}

if (!empty($alertMessage)) {
    ?>
    <div class="alert alert-<?= $alertCSS ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alertMessage ?>
    </div>
    <?php
}
?>

<br/>
<br/>

<?php
if ($user_id == -1) {
    ?>
    <p>L'utilisateur n'existe pas</p>
    <?php
} else {
    ?>
    <form action="../controller/deleteUser.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom de l'utilisateur : </label>
            <input type="text" class="form-control" name="nom" value="<?php echo $user->nom ?>" disabled="disabled"/>
        </div>
        <div class="form-group">
            <label for="city">Prénom : </label>
            <input type="text" class="form-control" name="prenom" value="<?php echo $user->prenom ?>" disabled="disabled"/>
        </div>
        <div class="form-group">
            <label for="state">Pseudo :</label>
            <input type="text" class="form-control" name="pseudo" value="<?php echo $user->pseudo ?>" disabled="disabled"/>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>"/>
        <input type="submit" value="Supprimer" class="btn btn-danger"/>

    </form>
    <?php
}
?>

<a href="list_user.php">Retour à la liste</a>
</body>
</html>