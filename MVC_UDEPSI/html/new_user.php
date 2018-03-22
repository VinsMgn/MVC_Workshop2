<html>
<h1> Inscription à la plateforme</h1>
<form method="post" action="../controller/insert_user.php">
    <p>
        <label for="nom">Votre nom :</label>
        <input type="text" name="nom" id="nom">
    </p>
    <p>
        <label for="prenom">Votre prénom :</label>
        <input type="text" name="prenom" id="prenom"></p>
    <p>
        <label for="mail">Votre mail :</label>
        <input type="email" name="mail" id="mail">
    </p>
    <p>
        <label for="datenaiss"> Votre date de naissance :</label>
        <input type="date" name="datenaiss" id="datenaiss">

    </p>

    <p>
        <label for="tel"> Votre numéro de téléphone :</label>
        <input type="text" name="tel" id="tel">

    </p>

    <p>
        <label for="pseudo">Votre pseudo :</label>
        <input type="text" name="pseudo" id="pseudo">
    </p>
    <p>
        <label for="mdp"> Choisissez un mot de passe :</label>
        <input type="password" name="mdp" id="mdp">
    </p>
    <input type="submit">
</form>
</html>
