<?php

class ControlerAjoutQuiz{
//Attribut
private ?string $message;
private ?string $listeQuiz;

//Constructeur
public function __construct(){
    //Déclaration des variables d'affichages
    $this->message = "";
    $this->listeQuiz = ""; 
}

//GETTER ET SETTER
public function getMessage(): ?string { return $this->message; }
public function setMessage(?string $message): self { $this->message = $message; return $this; }

public function getListeQuiz(): ?string { return $this->listeQuiz; }
public function setListeQuiz(?string $listeQuiz): self { $this->listeQuiz = $listeQuiz; return $this; }


//Méthodes

// Fonction pour format quiz data
private function listeQuiz($quiz): string {
    return "<div><h3>{$quiz['title']}</h3><p>{$quiz['description']}</p></div>";
}

//Fonction qui teste le formulaire d'ajout de quiz
//Param : void
//Return : array
public function formTestQuiz():array{
    //1) Vérifier le champ vide :
    if(empty($_POST["title_quiz"]) || empty($_POST["description_quiz"])){
        return ["title_quiz"=>"", "description_quiz"=>"","erreur"=>"Veuillez remplir les champs requis !"];
    }

    //2) Nettoyage des données
    $title_quiz = sanitize($_POST['title_quiz']);
    $description_quiz = sanitize($_POST['description_quiz']);

    //3) Retourner les données
    return ["title_quiz" => $title_quiz, "description_quiz" => $description_quiz, 'erreur' => ''];
}

//Fonction pour enregister un quiz en BDD
  public function registerQuiz():void{
    //Ajout d'un quiz en BDD
    //Je vérifie que je reçois le formulaire d'ajout
    if(isset($_POST['ajouterQuiz'])){
        //je teste le formulaire
        $tab = $this->formTestQuiz();

        //je vérifie si je suis dans le cas d'erreur
        if($tab['erreur'] != ''){
            $this->setMessage($tab['erreur']);
        }else{
            //Création de mon objet $quiz à partir de ManagerQuiz
            $quiz = new manager_ajout_quiz($tab['title_quiz']);

            //Sinon je vérifie si la catégorie existe déjà en BDD
            $data = $quiz->readQuizByName();

            //Je vérifie si tout s'est bien passé (pas d'erreur de communication avec la BDD)
            if(gettype($data) == 'string'){
                $this->setMessage('Une erreur est survenue. Veuillez réessayer ultérieurement.');
            }else if(!empty($data)){
                //Si elle existe, j'affiche un message d'erreur
                $this->setMessage("{$tab['title_quiz']} existe déjà !");
            }else{
                //Sinon j'effectue l'ajout et j'affiche un message de confirmation
                $this->setMessage($quiz->addQuiz());
            }
            
        }
    }
}

//Fonction pour afficher la liste des quiz
public function displayQuiz():void{
    //Affichage de la liste des quiz
    //Création de mon objet $quiz à partir de manager_ajout_quiz
    $quiz = new manager_ajout_quiz(null);

    //je récupère la liste des quiz
    $data = $quiz->readQuiz();
    //Je vérifie si tout s'est bien passé (pas d'erreur de communication avec la BDD)
    if(gettype($data) == 'string'){
        $this->setListeQuiz('Une erreur est survenue. Veuillez réessayer ultérieurement.');
    }else{
        //Sinon j'affiche la liste des quiz
        foreach($data as $quiz){
            $this->setListeQuiz($this->getListeQuiz().$this->listeQuiz($quiz));
        }
    } 
}
}