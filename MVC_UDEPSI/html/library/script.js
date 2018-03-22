window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btn_top").style.left = "0";
    } else {
        document.getElementById("btn_top").style.left = "-100px";
    }
}

function topFunction() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0;
}

function isconnected(){

}

function display_top_formateurs(){

    if (document.getElementById("top_formateurs").style.right == "0vw"){
        document.getElementById("top_formateurs").style.right = "-15vw";
        document.getElementById("btn_formateurs").style.width = "9vw"

    } else {
        document.getElementById("top_formateurs").style.right="0vw";
        document.getElementById("btn_formateurs").style.width = "13vw"
    }
}

function display_top_cours(){
    if (document.getElementById("top_cours").style.left == "0vw"){
        document.getElementById("top_cours").style.left = "-15vw";
        document.getElementById("btn_cours").style.width = "9vw"

    } else {
        document.getElementById("top_cours").style.left="0vw";
        document.getElementById("btn_cours").style.width = "13vw"
    }
}