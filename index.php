<?php 

//J'active la session
session_start();

//J'inclure mes resources communes à chaque route
include './utils/sanitize.php';

//Récupération de l'url entrée par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);

//Je dois récupérer le path entré par l'utilisateur, en bref, la page demandé
$path = (isset($url['path'])) ? $url['path'] : '/';

//print_r($path);

switch($path){
    // page d'accueil
    case '/MFS/' :
        //inclure mes views
        $style='accueil';
        $script='accueil';
        include './view/view_header.php';
        include './view/view_accueil.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ajout_quiz' :
        //inclure mes views
        $style='ajout_quiz';
        $script='ajout_quiz';
        include './view/view_header.php';
        include './view/view_ajout_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/compte' :
        //inclure mes views
        $style='compte';
        $script='compte';
        include './view/view_header.php';
        include './view/view_compte.php';
        include './view/view_footer.php';
        break;
    case '/MFS/Connexion_Inscription' :
        //inclure mes views
        $style='connexion_inscription';
        $script='connexion_inscription';
        include './view/view_header.php';
        include './view/view_connexion_inscription.php';
        include './view/view_footer.php';
        break;
    case '/MFS/liste_quiz' :
        //inclure mes views
        $style='liste';
        $script='liste';
        include './view/view_header.php';
        include './view/view_liste_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ajout_quiz' :
        //inclure mes views
        $style='ajout_quiz';
        $script='ajout_quiz';
        include './view/view_header.php';
        include './view/view_ajout_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/liste_utilisateur' :
        //inclure mes views
        $style='liste_utilisateur';
        $script='liste_utilisateur';
        include './view/view_header.php';
        include './view/view_liste_utilisateur.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ban_liste' :
        //inclure mes views
        $style='ban_liste';
        $script='ban_liste';
        include './view/view_header.php';
        include './view/view_ban_liste.php';
        include './view/view_footer.php';
        break;
}