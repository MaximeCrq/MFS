<?php

class ControlInscription{
   

    private ?string $message;

    public function __construct(){
        $this->message = "";
    }

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    
    
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

        // $motDePasse= password_hash($mdp,PASSWORD_BCRYPT);
     
        return ["nom"=>$nom,"prenom"=>$prenom,"mail"=>$mail,"mdp"=>$mdp,"erreur"=>""];
    }
    

    
    public function controlForm(){

        if(isset($_POST["inscription"])){
            echo('crevette2');
            $mes_donnee = $this->nettoyage_donnee_insc();

            if($mes_donnee['erreur'] != ''){
                echo('crevette3');
                $this->setMessage($mes_donnee['erreur']);

            }else{
                echo('crevette4');
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
}

?>