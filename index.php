<?php 

//J'active la session
session_start();

//J'inclure mes resources communes à chaque route
include './utils/sanitize.php';

//Récupération de l'url entrée par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);

//Je dois récupérer le path entré par l'utilisateur, en bref, la page demandé
$path = (isset($url['path'])) ? $url['path'] : '/';

print_r($path);

switch($path){
    // page d'accueil
    case '/MFS/' :
        //J'inclure mes views
        include './view/header.php';
        include './view/accueil.php';
        
        break;
}