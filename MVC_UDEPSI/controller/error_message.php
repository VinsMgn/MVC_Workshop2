
<div id="message">
    <?php

    // Cherche à récupérer le mot "error_login" dans l'url (erreur dans la saisie des logs utilisateurs).
    if(getVar('error_login') !== FALSE){
        // Si le mot error_login est contenu dans le lien, renvoie le message d'erreur suivant :
        echo('<script> alert("Mauvais login ou mauvais mot de passe, veuillez ressayer !"); </script>');
        // Cherche à récupérer le mot "error" dans l'url signifiant une connexion à un url utilisateur sans s'être connecté
    }else if((getVar("error")) !== FALSE) {
        //renvoie le message d'erreur suivant :
        echo '<script> alert("Vous avez essayé de vous connecter sur une page sans vous être connecté, veuillez vous identifier !");</script>';
    }

    ?>
</div>