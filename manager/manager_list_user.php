<?php
class ListUser {

    function List_USER(){
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        try{
            //2nd Etape : préparer ma requête INSERT INTO
            $req = $bdd->prepare('SELECT(firstname_user, lastname_user, email_user,password_user) FROM users ');
            

            //4eme Etape : exécution de la requête
            $req->execute();


            //5eme Etape : Retourne un message de confirmation
            return "vous avez reçu une liste";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
?>