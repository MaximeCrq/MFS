<?php
class Deconnexion{
    public function deconnexion(){
        //Je détruis la session
        session_destroy();

        //Je redirige vers la page d'accueil index.php
        header('Location:/MFS/');
        exit;
    }
}


?>