<?php
class ControlerList {
        $manage_user = new  ManagerListUser;

        $user=$manage_user->List_USER();

        print_r($user);
        
        public function boucle(){
            foreach($user as $cards){
                $user.=$user.cards($cards);
            }
        }


    public function cards ($utilisateur){
        return "<article style='border-bottom : 3px solid>
            <h3>Login : {$utilisateur['login_user']}</h3>
            <p>Nom - Prénom : {$utilisateur['name_user']} - {$utilisateur['first_name_user']}</p>
        </article>";
    }


    public function List_USER(){
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        try{
            //2nd Etape : préparer ma requête INSERT INTO
            $req = $bdd->prepare('SELECT firstname_user, lastname_user, email_user,password_user FROM users ');
            

            //4eme Etape : exécution de la requête
            $req->execute();

            $donner = $req->fetchAll(PDO::FETCH_ASSOC);
            //5eme Etape : Retourne un message de confirmation
            return $donner ;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}


?>