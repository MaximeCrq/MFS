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
        //J'inclure mes views
        $style='accueil';
        $script='accueil';
        include './view/view_header.php';
        include './view/view_accueil.php';
        include './view/view_footer.php';
        break;
}