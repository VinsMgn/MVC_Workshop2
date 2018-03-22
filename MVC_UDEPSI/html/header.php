<div class="container-fluid">    
    <?php session_start(); 

    if (basename($_SERVER['PHP_SELF']) == "index.php"){ ?>
        <button class="top_button" onclick="topFunction()" id="btn_top" title="Go to top">
            <img class="top_arrow" src="img/arrow.svg">
        </button>
    <?php } ?>


    <div id="btn_formateurs" onclick="display_top_formateurs()">
        <p id="btn_formateurs_text">
            Top formateurs
        </p>
    </div>
    
    <div id="btn_cours" onclick="display_top_cours()">
        <p id="btn_cours_text">
            <?php if(isset($_SESSION['login'])) { ?>
                Abonnements
            <?php } else { ?>
                Top cours
            <?php } ?>
        </p>
    </div>
        
    <div id="top_formateurs">
        <p class="top_text">
            oui
        </p>
    </div>

    <div id="top_cours">
        <p class="top_text">
            oui
        </p>
    </div>

    <?php if(basename($_SERVER['PHP_SELF']) == "new_user.php" | basename($_SERVER['PHP_SELF']) == "see_profile.php") { ?>
    <div class="connexion">
        <a href="index.php">
            <div class="btn_accueil">
                Retour à la <br/>Page d'accueil
            </div>
        </a>
    </div>
    

    <?php } else if (isset($_SESSION['login'])) { ?>

    <div class=connexion>
        <a href="see_profile.php">
            <img src="img/hayden.jpg" class="pp"/>
        </a>
        <p class="connected_as">
            Connecté en tant que <?=$_SESSION["login"]?>
        </p>
        </br>
        <a href="disconnect">
            <span class="connexion_option">
                Déconnexion
            </span>
        </a>
        </br>
        <a href="see_profile">
            <span class="connexion_option">
                Voir mon profil
            </span>
        </a>
    </div>
    
    <?php } else { ?>

    <a href="../view/login.php">
        <div class=connect>
            Se connecter
        </div>
    </a>

    <a href="new_user.php">
        <div class="register">
            S'inscrire
        </div>
    </a>
                
    <?php } ?>

    <?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>

    <div class="searchbar">
        <form action="action_page.php" class="form">
            <input class="search" type="text" placeholder="Rechercher..."  name="search">
            <div class="others">
                
                <button type="submit" class="submit">
                    <img class="magnifier" src="img/search.svg"/>
                </button>
                <select class="category">
                    <option value="cours">Cours</option>
                    <option value="utilisateur">Utilisateur</option>
                    <option value="compétence">Compétence</option>
                </select>
            </div>
        </form>
    </div>

    <?php } ?>


    <div class="mainpagebutton">
        <a href = "index.php" >
            <img class="udepsi_logo" src="img/logo.png" alt"logo epsi"/>
            <img class="epsi_logo" src="img/epsi_l.png" alt="logo epsi"/> 
        </a>
    </div>
    
</div>