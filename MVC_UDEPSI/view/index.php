<?php session_start()?>
<!DOCTYPE html>
<HTML>

<head>
    <link rel="stylesheet" type="text/css" href="../html/style.css">
    <link rel="stylesheet" type="text/css" href="../html/library/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../html/library/script.js"></script>
</head>

<body>
    <div class="container-fluid">    
        <button class="top_button" onclick="topFunction()" id="btn_top" title="Go to top">
            <img class="top_arrow" src="../html/img/arrow.svg">
        </button>
        <div class="row strip">

            <div class="col-3" style="padding:0px">
                <div class="row strip">
                    <!-- Si connecté -->
                    <div class="col-10 connexion">
                        <div class=panel_user>
                        <a href="index.php">
                            <img src="../html/img/hayden.jpg" class="pp"/>
                            <a href="../controller/see_profile.php"> Voir mon profil</a>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Si pas connecté
                    <a href="index.php">
                        <div class=connect>
                            Se connecter
                        </div>
                    </a>
                    <a href="index.php">
                        <div class="register">
                            S'inscrire
                        </div>
                    </a>
                    -->

                    <div class="col-2">
                    </div>
                </div>
            </div> 

            <div class="col-6 ">
                <div class="row" style="height:5vw">
                    <div class="col-1">
                         
                    </div>
                    <div class="col-11">
                        <div class="searchbar">
                            <form action="action_page.php" class="form">
                                <input class="search" type="text" placeholder="Rechercher..."  name="search">
                                <div class="others">
                                    
                                    <button type="submit" class="submit">
                                        <img class="magnifier" src="../html/img/search.svg"/>
                                    </button>
                                    <select class="category">
                                        <option value="cours">Cours</option>
                                        <option value="utilisateur">Utilisateur</option>
                                        <option value="compétence">Compétence</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="col-3">
                <div class="row strip">

                    <div class="col-5">
                    </div>

                    <div class="col-7 udepsi_strip">
                        <a href = "index.php" class="mainpagebutton">
                            <img class="udepsi_logo" src="../html/img/logo.png" alt"logo epsi"/>
                            <img class="epsi_logo" src="../html/img/epsi_l.png" alt="logo epsi"/>
                        </a>
                    </div>
                </div>
            </div>

        </div>   

        <div class="row main" style="margin-left=1vw !important">
            <div id="test" class="col-12" style="text-align: center">
                <div class="content-main">
                    <div class="course">
                        <img class="course-tech" src="../html/img/php.png"/>
                        <div class="course-title">
                            Dynamiser son site web avec PHP
                        </div>
                        </br>
                        <div class="course-subtitle">
                            Par : gabriel Martin
                        </div>
                        </br>
                        <div class="course-line">
                        </div>

                        <div class="course-desc">
                            Lorem ipsum dolot sir amet deus ameno tot si veritum rectum nostrum i bien ein berliner
                        </div>
                    </div>
                    <div class="course">
                        <img class="course-tech" src="../html/img/cs.png"/>
                        <div class="course-title">
                            Titre du cours plus long
                        </div>
                        <div class="course-bottom">
                            Par : gabrielmartin
                        </div>

                        <div class="course-line">
                        </div>

                        <div class="course-desc">
                            Lorem ipsum dolot sir amet deus ameno tot si veritum rectum nostrum i bien ein berliner
                        </div>
                    </div>
                    <div class="course">
                        <img class="course-tech" src="../html/img/php.png"/>
                        <div class="course-title">
                            Titre du cours
                        </div>
                        <div class="course-bottom">
                            Par : gabriel
                        </div>

                        <div class="course-line">
                        </div>

                        <div class="course-desc">
                            Lorem ipsum dolot sir amet deus ameno tot si veritum rectum nostrum i bien ein berliner
                        </div>
                    </div>
                    <div class="course">
                        <img class="course-tech" src="../html/img/php.png"/>
                        <div class="course-title">
                            Titre du cours
                        </div>
                        <div class="course-bottom">
                            Par : gabriel
                        </div>

                        <div class="course-line">
                        </div>

                        <div class="course-desc">
                            Lorem ipsum dolot sir amet deus ameno tot si veritum rectum nostrum i bien ein berliner
                        </div>
                    </div>
                    <div class="course">
                        <img class="course-tech" src="../html/img/php.png"/>
                        <div class="course-title">
                            Titre du cours
                        </div>
                        <div class="course-bottom">
                            Par : gabriel
                        </div>

                        <div class="course-line">
                        </div>

                        <div class="course-desc">
                            Lorem ipsum dolot sir amet deus ameno tot si veritum rectum nostrum i bien ein berliner
                        </div>
                    </div>
                    <div class="course">
                        <img class="course-tech" src="../html/img/php.png"/>
                        <div class="course-title">
                            Titre du cours
                        </div>
                        <div class="course-bottom">
                            Par : gabriel
                        </div>

                        <div class="course-line">
                        </div>

                        <div class="course-desc">
                            Lorem ipsum dolot sir amet deus ameno tot si veritum rectum nostrum i bien ein berliner
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer" >
            Ceci est le pied-de-page
        </div>

    </div>

    

    

    <!--
        360/640
        480/848
        720/1280
        1080/1920
    -->

</body>

</HTML>
