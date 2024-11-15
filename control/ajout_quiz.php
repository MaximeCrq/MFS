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

//Fonction pour mettre en forme le <select> des categories
public function optionCategory(?array $categorie_quiz):string{
    return "<option value='".$categorie_quiz['id_category']."'>{$categorie_quiz['title_category']}</option>";
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

}