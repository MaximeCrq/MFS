<?php
$message="";
function nettoyage_donnee_insc(){
    if(empty($_POST["nom"])|| empty($_POST["prenom"]) || empty($_POST["mail"])||empty($_POST["mdp"])){
            return ["erreur" => "vous n’avez pas remplie tous les champs"];
    }
        if(!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL)){
            return ["erreur"=>"votre email n’ai pas valide"];
    }
    
    
    $nom =sanitize($_POST["nom"]);
    $prenom =sanitize($_POST["prenom"]);
    $mail =sanitize($_POST["mail"]);
    $mdp =sanitize($_POST["mdp"]);
    
    
    $motDePasse = password_hash($mdp,PASSWORD_BCRYPT);
    
    
    return ["nom"=>$nom,"prenom"=>$prenom,"mail"=>$mail,"mdp"=>$motDePasse];
    }
    
    
    $mes_donnee = nettoyage_donnee_insc();
    
    
    
    $nouveau_objet=new manager_user;
if(isset($_POST["inscription"])){
    echo("crevette");
     if($mes_donnee['erreur'] != ''){
            $message = $mes_donnee['erreur'];
            echo("crevette");
        }
    else{
        $data = recherchUser($mes_donnee["mail"]);
        if(gettype($data) == 'string'){
            $message = $data;
            }else{
                if(empty($data)){

                $nouveau_objet->setFirstname($mes_donnee["prenom"])->setLastname($mes_donnee["nom"])->setEmail($mes_donnee["mail"])->setPassword($mes_donnee["mdp"]);

                $_SESSION['login_user']=$nouveau_objet->getEmail();
                $_SESSION['lastname_user']=$nouveau_objet->getLastname();
                $_SESSION['fistname_user']=$nouveau_objet->getFirstname();
                $_SESSION['password']=$nouveau_objet->getPassword();
                $message="vous avez bien enregistrer";
                }
            }       
    
        }    
}
?>