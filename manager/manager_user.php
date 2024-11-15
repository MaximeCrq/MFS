<?php
class ManagerUser extends ModelUser{

    function add_USER(){
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       
       
        try{
            //2nd Etape : préparer ma requête INSERT INTO
            $req = $bdd->prepare('INSERT INTO users (firstname_user, lastname_user, email_user,password_user) VALUES (?,?,?,?)');
    
    
            $nom_user=$this->getFirstname();
            $prenom_user =$this->getLastname();
            $mail_user= $this->getEmail();
            $mdp_user= $this->getPassword();
            
    
    
    
            //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
            $req->bindParam(1,$nom_user,PDO::PARAM_STR);
            $req->bindParam(2,$prenom_user,PDO::PARAM_STR);
            $req->bindParam(3,$mail_user,PDO::PARAM_STR);
            $req->bindParam(4,$mdp_user,PDO::PARAM_STR);
    
    
            //4eme Etape : exécution de la requête
            $req->execute();
    
    
            //5eme Etape : Retourne un message de confirmation
            return "$nom_user $prenom_user vous êtes connecter";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    

}

function recherche_User($login_user){
    //1Er Etape : Instancier l'objet de connexion PDO
    $bdd = new PDO('mysql:host=localhost;dbname=task5','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    //Try...Catch
    try{
        //2nd Etape : préparer ma requête SELECT
        $req = $bdd->prepare('SELECT id_user, lastname_user, firstname_user, email_user, password_user FROM users WHERE email_user = ?');


        //3Eme Etape : introduire le login de l'utilisateur dans ma requête avec du Binding de Paramètre
        $req->bindParam(1,$login_user,PDO::PARAM_STR);


        //4eme Etape : executer la requête
        $req->execute();


        //5eme Etape : Récupère les réponses de la BDD
        $data = $req->fetchAll(PDO::FETCH_ASSOC);


        //6eme Etape : je retourne mes $data
        return $data;
    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}


?>