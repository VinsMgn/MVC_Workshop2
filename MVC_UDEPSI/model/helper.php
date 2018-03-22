<?php

function getVar($name){
    if(isset($_GET[$name])){
        if(!empty($_GET[$name])){
            return $_GET[$name];
        }
        return true;
    }
    return false;
}

function postVar($name){
    if(isset($_POST[$name])){
        if(!empty($_POST[$name])){
            return $_POST[$name];
        }
        return true;
    }
    return false;
}

function sessionVar($name){
    @session_start();
    if(isset($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return true;
    }
    return false;
}

// Retourne la variable "usertype" de la session utilisateur (Définissant si l'utilisateur est connecté ou non)
function getAuth(){
    return sessionVar("usertype");
}


function addPage(&$menu, $url, $text, $css=""){
    $menu[] = array($url, $text, $css);
}

?>