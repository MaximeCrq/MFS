<?php 

//J'active la session
session_start();

//J'inclure mes resources communes à chaque route
include './utils/sanitize.php';
include './control/controlerHeader.php';
include './model/model_users.php';
include './manager/manager_user.php';

$header = new ControlerHeader();
$header-> displayNav();

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
    case '/MFS/accueil' :
        //inclure mes views
        $style='accueil';
        $script='accueil';
        include './view/view_header.php';
        include './view/view_accueil.php';
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
    case '/MFS/connexion_inscription' :
        //inclure mes views
        include "./control/connexion_inscription.php";
        $user = new ControlInscription;
        $user->controlForm();
        $style='connexion_inscription';
        $script='connexion_inscription';
        include './view/view_header.php';
        include './view/view_connexion_inscription.php';
        include './view/view_footer.php';
        break;
    case '/MFS/liste_quiz' :
        //inclure mes views
        $style='liste_quiz';
        $script='liste_quiz';
        include './view/view_header.php';
        include './view/view_liste_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/mentions_legales' :
        //inclure mes views
        $style='mentions_legales';
        $script='mentions_legales';
        include './view/view_header.php';
        include './view/view_mentions_legales.php';
        include './view/view_footer.php';
        break;
    case '/MFS/statistique' :
        //inclure mes views
        $style='statistique';
        $script='statistique';
        include './view/view_header.php';
        include './view/view_statistique.php';
        include './view/view_footer.php';
        break;


    //QUIZZ
    //ESSAIE
    case '/MFS/liste_quiz/quiz1' :
        //inclure mes views
        $style='quiz';
        $script='quiz';
        include './view/view_header.php';
        include './view/quiz/quiz1.php';
        include './view/view_footer.php';
        break;



    //ADMINISTRATEUR
    case '/MFS/ajout_quiz' :
        //inclure mes views
        $style='ajout_quiz';
        $script='ajout_quiz';
        include './view/view_header.php';
        include './view/view_ajout_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ajout_quiz_question' :
        //inclure mes views
        $style='ajout_quiz_question';
        $script='ajout_quiz_question';
        include './view/view_header.php';
        include './view/view_ajout_question.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ajout_formateur' :
        //inclure mes views
        $style='ajout_formateur';
        $script='ajout_formateur';
        include './view/view_header.php';
        include './view/view_ajout_formateur.php';
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