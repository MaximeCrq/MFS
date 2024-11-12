<?php
class Deconnexion{
    public function deco(){
        //Je détruis la session
        session_destroy();

        //Je redirige vers la page d'accueil index.php
        header('Location:/php/Exercice/POO/Projet_Task_POO/');
        exit;
    }
}


?>