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

//Fonction pour enregister un quiz en BDD
public function registerQuestion():void{
    //Ajout d'un quiz en BDD
    //Je vérifie que je reçois le formulaire d'ajout
    if(isset($_POST['ajout_question'])){
        //je teste le formulaire
        $tab = $this->formTestQuestion();

        //je vérifie si je suis dans le cas d'erreur
        if($tab['erreur'] != ''){
            $this->setMessageQuestion($tab['erreur']);
        }else{
            //Création de mon objet $quiz à partir de ManagerQuiz
            $quiz = new manager_ajout_quiz ($tab['questionPose'], $tab['reponseBonne'], $tab['reponseMauvaise_1'], $tab['reponseMauvaise_2']);

            //Sinon je vérifie si le quiz existe déjà en BDD
            $data = $quiz->readQuestitonByName();

            //Je vérifie si tout s'est bien passé (pas d'erreur de communication avec la BDD)
            if(gettype($data) == 'string'){
                $this->setMessageQuestion('Une erreur est survenue. Veuillez réessayer ultérieurement.');
            }else if(!empty($data)){
                //Si elle existe, j'affiche un message d'erreur
                $this->setMessageQuestion("{$tab['title_quiz']} existe déjà !");
            }else{
                //Sinon j'effectue l'ajout et j'affiche un message de confirmation
                $this->setMessageQuestion($quiz->addQuiz());
            }
            
        }
    }
}



}