<?php
class ControlerQuizQuestion {
//Attribut
private ?string $messageQuestion;


//Constructeur
public function __construct(){
    //Déclaration des variables d'affichages
    $this->messageQuestion = "";

}

//GETTER ET SETTER
public function getMessageQuestion(): ?string { return $this->messageQuestion; }
public function setMessageQuestion(?string $messageQuestion): self { $this->messageQuestion = $messageQuestion; return $this; }


//Méthodes

//Fonction qui teste le formulaire d'ajout de question
//Param : void
//Return : array
public function formTestQuestion():array{
    //1) Vérifier le champ vide :
    if(empty($_POST["questionPose"]) || empty($_POST["reponseBonne"]) || empty($_POST["reponseMauvaise_1"]) || empty($_POST["reponseMauvaise_2"])){
        return ["questionPose"=>"", "reponseBonne"=>"", "reponseMauvaise_1"=>"", "reponseMauvaise_2"=>"","erreur"=>"Veuillez remplir les champs requis !"];
    }

    //2) Nettoyage des données
    $questionPose = sanitize($_POST['questionPose']);
    $reponseBonne = sanitize($_POST['reponseBonne']);
    $reponseMauvaise_1 = sanitize($_POST['reponseMauvaise_1']);
    $reponseMauvaise_2 = sanitize($_POST['reponseMauvaise_2']);

    //3) Retourner les données
    return ["questionPose" => $questionPose, "reponseBonne" => $reponseBonne, "reponseMauvaise_1" => $reponseMauvaise_1, "reponseMauvaise_2" => $reponseMauvaise_2, 'erreur' => ''];
}





}