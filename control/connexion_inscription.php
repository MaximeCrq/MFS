<?php

class ControlInscription{
   

    private ?string $message;

    public function __construct(){
        $this->message = "";
        $this->messageCo ="";
    }

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    public function getMessageCo(): ?string { return $this->messageCo; }
    public function setMessageCo(?string $messageCo): self { $this->messageCo = $messageCo; return $this; }


    
    
    public function nettoyage_donnee_insc():array{
        if(empty($_POST["nom"])|| empty($_POST["prenom"]) || empty($_POST["mail"])||empty($_POST["mdp"])){
                return ["erreur" => "vous n'avez pas remplie tous les champs"];
        }

        $nom =sanitize($_POST["nom"]);
        $prenom =sanitize($_POST["prenom"]);
        $mail =sanitize($_POST["mail"]);
        $mdp =sanitize($_POST["mdp"]);

        // if(!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL)){
        //         return ["erreur"=>"votre email n'ai pas valide"];
        // }

        $mdpHash= password_hash($mdp,PASSWORD_BCRYPT);
     
        return ["nom"=>$nom,"prenom"=>$prenom,"mail"=>$mail,"mdp"=>$mdpHash,"erreur"=>""];
    }

    public function nettoyage_donnee_connexion():array{
        //1er Etape de sécurité : vérifie si les champs obligatoires sont vides
        if(empty($_POST["mailCo"]) || empty($_POST["mdpCo"])){
            return ["mailCo"=>'',"mdpCo"=>'',"erreur"=>'Veuillez remplir votre adresse mail ET votre mot de passe'];
        }

        //2nd Etape de sécurité : nettoyage
        $mailCo = sanitize($_POST["mailCo"]);
        $mdpCo = sanitize($_POST["mdpCo"]);

        //3eme Etape de sécurité : Vérifier que les données sont au bon format
        // if(!filter_var($mailCo,FILTER_VALIDATE_EMAIL)){
        //     return ["mailCo"=>'',"mdpCo"=>'',"erreur"=>'Login pas au bon format !'];
        // }

        return ["mailCo"=>$mailCo,"mdpCo"=>$mdpCo,"erreur"=>''];
    }
    

    
    public function controlForm(){

        if(isset($_POST["inscription"])){
            $mes_donnee = $this->nettoyage_donnee_insc();

            if($mes_donnee['erreur'] != ''){
                $this->setMessage($mes_donnee['erreur']);

            }else{
                $utilisateur=new ManagerUser($mes_donnee['mail']);
                $utilisateur->setFirstname($mes_donnee["prenom"])->setLastname($mes_donnee["nom"])->setEmail($mes_donnee["mail"])->setPassword($mes_donnee["mdp"]);
                        
                if(empty($utilisateur->recherche_User())){
                    $this->setMessage($utilisateur->add_USER());

                }else{
                    $this->setMessage("Ce Login existe déjà en BDD !");
                }     
            
            }    
        }
    }    

    public function controlConnexion(){
        if(isset($_POST['connexion'])){
            $tableau = $this->nettoyage_donnee_connexion();

            if($tableau['erreur'] != ''){
                $this->setMessageCo($tableau['erreur']);
            }else{
                
                $userCo = new ManagerUser($tableau['mailCo']);

                $data = $userCo->recherche_User();

                if(gettype($data) == 'string'){
                    $this->setMessageCo($data);

                }else{
                    if(empty($data)){
                        $this->setMessageCo("Mauvais mail ou mot de passe");
                    }else{

                        if(!password_verify($tableau['mdpCo'],$data[0]['password_user'])){
                            $this->setMessageCo("Mauvais mail ou mot de passe");
                            
                        }
                        else{
                            $_SESSION['id_user'] = $data[0]['id_user'];
                            $_SESSION['firstname_user'] = $data[0]['firstname_user'];
                            $_SESSION['lastname_user'] = $data[0]['lastname_user'];
                            $_SESSION['email_user'] = $data[0]['email_user'];
                            print_r($_SESSION['id_user']);
                            $this->setMessageCo("{$_SESSION['firstname_user']} est connecté avec succés !");
                        }
                    }
                }
            }
        }
    }
}

?>