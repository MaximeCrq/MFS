<?php

class ControlInscription{
   

    private $message;

    public function __construct(){
        $this->message="";
        
    }

    public function setErrorMes(?string $message): self
    {
        $this->message = $message;
        return $this;
    }
    public function getErrorMes()
    {
        return $this->message;
    }

    
    
    public function nettoyage_donnee_insc(){
        if(empty($_POST["nom"])|| empty($_POST["prenom"]) || empty($_POST["mail"])||empty($_POST["mdp"])){
                return ["erreur" => "vous n'avez pas remplie tous les champs"];
        }
            if(!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL)){
                return ["erreur"=>"votre email n'ai pas valide"];
        }
    
    
        $nom =sanitize($_POST["nom"]);
        $prenom =sanitize($_POST["prenom"]);
        $mail =sanitize($_POST["mail"]);
        $mdp =sanitize($_POST["mdp"]);

        $motDePasse= password_hash($mdp,PASSWORD_BCRYPT);
     
        return ["nom"=>$nom,"prenom"=>$prenom,"mail"=>$mail,"mdp"=>$motDePasse,"erreur"=>""];
    }
    

    
    public function controlForm(){
        echo('crevette');
        if(isset($_POST["inscription"])){
            echo('crevette');
            $mes_donnee = $this->nettoyage_donnee_insc();
            if($mes_donnee['erreur'] != ''){
                echo('crevette3');
                    $this->setErrorMes($mes_donnee['erreur']);
                }
            else{
                echo('crevette4');
                $nouveau_objet=new ManagerUser;
                $data =  $this->$nouveau_objet->recherche_User($mes_donnee["mail"]);
                if(gettype($data) == 'string'){
                    echo('crevette5');
                        $this->setErrorMes($data);
                    }else{
                        if(empty($data)){
                            echo('crevette6');

                        $nouveau_objet->setFirstname($mes_donnee["prenom"]);
                        $nouveau_objet->setLastname($mes_donnee["nom"])->setEmail($mes_donnee["mail"])->setPassword($mes_donnee["mdp"]);
                        $nouveau_objet->add_USER();
                        echo('crevette7');
                       
                        }
                    }       
            
                }    
        
        }
    }    
}

?>