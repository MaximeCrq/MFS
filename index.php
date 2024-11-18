<?php 

//J'active la session
session_start();

//J'inclure mes resources communes à chaque route
include './utils/sanitize.php';
include './control/controlerHeader.php';
include './model/model_users.php';
include './model/model_quiz.php';
include './manager/manager_user.php';
include './manager/manager_ajout_quiz.php';

$header = new ControlerHeader();


//Récupération de l'url entrée par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);

//Je dois récupérer le path entré par l'utilisateur, en bref, la page demandé
$path = (isset($url['path'])) ? $url['path'] : '/';

//print_r($path);

switch($path){
    // page d'accueil
    case '/MFS/' :
        //inclure mes views
        $header-> displayNav();
        $header->role();
        $style='accueil';
        $script='accueil';
        include './view/view_header.php';
        include './view/view_accueil.php';
        include './view/view_footer.php';
        break;
    case '/MFS/accueil' :
        //inclure mes views
        $header-> displayNav();
        $header->role();
        $style='accueil';
        $script='accueil';
        include './view/view_header.php';
        include './view/view_accueil.php';
        include './view/view_footer.php';
        break;
    case '/MFS/compte' :
        //inclure mes views
        $header-> displayNav();
        $header->role();
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
        $user->controlConnexion();
        $user->controlForm();
        $header-> displayNav();
        $header->role();
        $style='connexion_inscription';
        $script='connexion_inscription';
        include './view/view_header.php';
        include './view/view_connexion_inscription.php';
        include './view/view_footer.php';
        break;
    case '/MFS/liste_quiz' :
        include './control/ajout_quiz.php';
        //inclure mes views
        $quiz = new ControlerAjoutQuiz();
        $quiz->displayQuiz();
        $header-> displayNav();
        $header->role();
        $style='liste_quiz';
        $script='liste_quiz';
        include './view/view_header.php';
        include './view/view_liste_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/mentions_legales' :
        //inclure mes views
        $header-> displayNav();
        $header->role();
        $style='mentions_legales';
        $script='mentions_legales';
        include './view/view_header.php';
        include './view/view_mentions_legales.php';
        include './view/view_footer.php';
        break;
    case '/MFS/statistique' :
        //inclure mes views
        $header-> displayNav();
        $header->role();
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
        $header-> displayNav();
        $header->role();
        $style='quiz';
        $script='quiz';
        include './view/view_header.php';
        include './view/quiz/quiz1.php';
        include './view/view_footer.php';
        break;



    //ADMINISTRATEUR
    case '/MFS/ajout_quiz' :
        include './control/ajout_quiz.php';
        //inclure mes views
        $quiz = new ControlerAjoutQuiz();
        $quiz->displayQuiz();
        $quiz->registerQuiz();
        $header-> displayNav();
        $header->role();
        $style='ajout_quiz';
        $script='ajout_quiz';
        include './view/view_header.php';
        include './view/view_ajout_quiz.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ajout_quiz_question' :
        include './control/ajout_quiz_question.php';
        //inclure mes views
        $quiz = new ControlerQuizQuestion();
        $header-> displayNav();
        $header->role();
        $style='ajout_quiz_question';
        $script='ajout_quiz_question';
        include './view/view_header.php';
        include './view/view_ajout_question.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ajout_formateur' :
        //inclure mes views
        include './control/liste_admin_user.php';
        $user4= new ControlerListAdmin;
        $user4->listUser();
        $header-> displayNav();
        $header->role();
        $style='ajout_formateur';
        $script='ajout_formateur';
        include './view/view_header.php';
        include './view/view_ajout_formateur.php';
        include './view/view_footer.php';
        break;
    case '/MFS/liste_utilisateur' :
        //inclure mes views
        include './control/list_user.php';
        $user2=new ControlerList;
        $user2->listUser();
        $header-> displayNav();
        $header->role();
        $style='liste_utilisateur';
        $script='liste_utilisateur';
        include './view/view_header.php';
        include './view/view_liste_utilisateur.php';
        include './view/view_footer.php';
        break;
    case '/MFS/ban_liste' :
        //inclure mes views
        include './control/liste_user_ban.php';
        $user3=new ControlerListBan;
        $user3->listUser();
        $header-> displayNav();
        $header->role();
        $style='ban_liste';
        $script='ban_liste';
        include './view/view_header.php';
        include './view/view_ban_liste.php';
        include './view/view_footer.php';
        break;


    //DECONNEXION
    case '/MFS/deconnexion' :
        include './control/deconnexion.php';
        $deco = new Deconnexion();
        $deco->deconnexion();
        break;
}