<?php


function getDataBase()
{
    $host = "localhost";
    $dbName = "udepsi";
    $login = "root";
    $password = "";

    try
    {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}

function authenticateUser($login, $password, PDO $bdd = null)
{

    $user = null;

    if ($bdd == null)
    {
        $bdd = getDataBase();
    }

    $connect = false;
    if ($bdd)
    {
        try
        {
            $stmt = $bdd->prepare ("SELECT * FROM utilisateur WHERE pseudo=:pPseudo AND mdp=:pmdp");
            $stmt->bindParam(':pPseudo', $login);
            $stmt->bindParam(':pmdp', $password);
            if ($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if ($user && $password== $user->mdp) {
                    $connect = true;
                }
            }
        }
        catch (Exception $e)
        {
            $connect = false;
        }
    }
    if ($connect){

        return $user;
    }
    return null;

}



function getCompetences($nom_comp,$theme_comp,PDO $bdd = null) {
    $competences = null;

    if ($bdd == null)
    {
        $bdd = getDataBase();
    }

    if ($bdd)
    {
        // connexion réussie
        // La requete de base
        $query = "SELECT * FROM competence WHERE 1=1 ";
        $queryWhere="";
        $queryWhere2="";
        // On récupère tout le contenu de la table
        if (empty($nom_comp)) {
            // Tous les enregistrements
            $stmt = $bdd->prepare($query);
        } else {
            $queryWhere = "";
            if (!empty($nom_comp)) {
                $queryWhere = " AND nom_competence = :pName";
            }
            if(!empty($theme_comp)){
                $queryWhere2 = " AND theme = :pTheme";
            }

            // Concanetation de la requete
            $query = $query . $queryWhere . $queryWhere2;
            $stmt = $bdd->prepare($query);
            if (!empty($nom_comp)) {;
                $stmt->bindParam(':pName', $nom_comp);
            }
            if (!empty($theme_comp)){
                $stmt->bindParam(':pTheme',$theme_comp);
            }
        }
        $stmt->execute();

        $competences = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    return $competences;
}

function getUniqueCompetenceName(PDO $bdd = null)
{
    if ($bdd == null)
    {
        $bdd = getDataBase();
    }

    if ($bdd)
    {

        $query = "SELECT DISTINCT (nom_competence) as nom_competence FROM competence ORDER BY nom_competence";
        $resultset = $bdd->query($query);
        $liste = $resultset->fetchAll(PDO::FETCH_OBJ);
        $resultset->closeCursor();

        return $liste;
    }

    return null;
}

function getUniqueCompetenceTheme(PDO $bdd = null)
{
    if ($bdd == null)
    {
        $bdd = getDataBase();
    }

    if ($bdd)
    {

        $query = "SELECT DISTINCT (theme) as theme FROM competence ORDER BY theme";
        $resultset = $bdd->query($query);
        $liste = $resultset->fetchAll(PDO::FETCH_OBJ);
        $resultset->closeCursor();

        return $liste;
    }

    return null;
}


function getUSER($nom, $state,PDO $bdd = null) {
    $publishers = null;

    if ($bdd == null)
    {
        $bdd = getDataBase();
    }

    if ($bdd)
    {
        // connexion reussie
        // La requete de base
        $query = "SELECT * FROM publishers AS p, country AS c WHERE p.idCountry = c.id";
        // On recupere tout le contenu de la table
        if (empty($state) && empty($nom)) {
            // Tous les enregistrements
            $stmt = $bdd->prepare($query);
        } else {
            $queryWhere = "";
            if (!empty($nom)) {
                $queryWhere = " AND pub_name like :pName";
            }
            if (!empty($state)) {
                $queryWhere .= " AND state = :pState";
            }
            // Concanetation de la requete
            $query = $query . $queryWhere;
            $stmt = $bdd->prepare($query);
            if (!empty($nom)) {
                $nom = $nom . "%";
                $stmt->bindParam(':pName', $nom);
            }
            if (!empty($state)) {
                $stmt->bindParam(':pState', $state);
            }
        }
        $stmt->execute();

        $publishers = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    return $publishers;
}

function getPublisher($id, PDO $bdd = null)
{
    $publisher = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {
        // connexion r�ussie
        // 3 - On r�cup�re toutes les donn�es de l'�diteur
        $query = "SELECT * FROM publishers WHERE pub_id = :pId";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':pId', $id);
        $stmt->execute();

        $publisher = $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $publisher;
}

function insertCompetenceProfile($idComp,$idUser, PDO $bdd = null)
{

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {

        // Insertion dans la bd
        $stmt = $bdd->prepare ("INSERT INTO competence_lvl (id_competence, id_user) VALUE(:pIdcomp,:pIduser)");
        $stmt->bindParam(':pIdcomp', $idComp);
        $stmt->bindParam(':pIduser', $idUser);
        $stmt->execute();

    }else{
        return null;
    }

}

function updateCompetence($id, $pub_name, $city, $state, $cbCountry, PDO $bdd = null)
{
    $nbModifs = 0;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {
        try
        {
            // Mise � jour dans la bd
            $stmt = $bdd->prepare ("UPDATE publishers SET pub_name=:pubName, city=:pCity, state=:pState, idCountry=:pIdCountry WHERE pub_id=:pubId");
            $stmt->bindParam(':pubId', $pub_id);
            $stmt->bindParam(':pubName', $pub_name);
            $stmt->bindParam(':pCity', $city);
            $stmt->bindParam(':pState', $state);
            $stmt->bindParam(':pIdCountry', $cbCountry, PDO::PARAM_INT);
            $nbModifs = $stmt->execute();
        }
        catch (Exception $e)
        {
            $nbModifs = 0;
        }
    }

    return $nbModifs;
}


/* //TODO est ce qu c'est encore utile ?
function getContries(PDO $bdd = null)
{
    $countries = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {
        // Obtention de la liste des pays
        $resultat = $bdd->query("SELECT * FROM country");
        if ($resultat) {
            $countries = $resultat->fetchAll(PDO::FETCH_OBJ);
            // Fermeture de la ressource
            $resultat->closeCursor();
        }
    }

    return $countries;
}
*/

