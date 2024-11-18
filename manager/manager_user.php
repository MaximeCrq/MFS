<?php
class ManagerUser extends ModelUser{

    //vérifier format
    public function add_USER():string{
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       
       
        try{
            $req = $bdd->prepare('INSERT INTO users (firstname_user, lastname_user, email_user,password_user,roles_user) VALUES (?,?,?,?,?)');
    
    
            $nom_user=$this->getFirstname();
            $prenom_user =$this->getLastname();
            $mail_user= $this->getEmail();
            $mdp_user= $this->getPassword();
            $role= $this->getRoles();
            
            $req->bindParam(1,$nom_user,PDO::PARAM_STR);
            $req->bindParam(2,$prenom_user,PDO::PARAM_STR);
            $req->bindParam(3,$mail_user,PDO::PARAM_STR);
            $req->bindParam(4,$mdp_user,PDO::PARAM_STR);
            $req->bindParam(5,$role,PDO::PARAM_STR);
    
            $req->execute();
    
            return "$nom_user $prenom_user vous êtes connecter";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function recherche_User():array | string{
        
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



        $email=$this->getEmail();
        
        try{
            $req = $bdd->prepare('SELECT id_user, lastname_user, firstname_user, email_user, password_user FROM users WHERE email_user = (?)');

            $req->bindParam(1,$email,PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    public function List_USER() :array | string{
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        try{
            
            $req = $bdd->prepare('SELECT firstname_user, lastname_user, email_user,password_user FROM users');
            
            $req->execute();

            $donner = $req->fetchAll(PDO::FETCH_ASSOC);

            return $donner ;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function banUSER() :array | string{
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        try{
            
            $req = $bdd->prepare('SELECT firstname_user, lastname_user, email_user,password_user FROM users where roles_user = 3');
            
            $req->execute();

            $donner = $req->fetchAll(PDO::FETCH_ASSOC);

            return $donner ;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    public function adminUSER() :array | string{
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        try{
            
            $req = $bdd->prepare('SELECT firstname_user, lastname_user, email_user,password_user FROM users where roles_user = 1');
            
            $req->execute();

            $donner = $req->fetchAll(PDO::FETCH_ASSOC);

            return $donner ;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
?>