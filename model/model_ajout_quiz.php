<?php
class ModelAjoutQuiz{

//Constructeur
public function __construct(){
    $id_ajout_quiz="";
    $questionPose="";
    $reponseBonne="";
    $reponseMauvaise_1="";
    $reponseMauvaise_2= "";
}

//Attributs 
    private ?int $id_ajout_quiz;
    private ?string $questionPose;
    private ?string $reponseBonne;
    private ?string $reponseMauvaise_1;
    private ?string $reponseMauvaise_2;


// Getter et Setter 
public function getIdAjoutQuiz(): ?int{
        return $this->id_ajout_quiz;
}
public function getQuestionPose(): ?string{
    return $this->questionPose;
}
public function getReponseBonne(): ?string{   
    return $this->reponseBonne;
}
public function getReponseMauvaise_1(): ?string{   
    return $this->reponseMauvaise_1;
}
public function getReponseMauvaise_2(): ?string{   
    return $this->reponseMauvaise_2;
}

public function setIdQuiz(?int $id_ajout_quiz): self{
        $this->id = $id_ajout_quiz;
        return $this;
}
public function setQuestionPose(?string $questionPose): self{
    $this->questionPose = $questionPose;
    return $this;
}
public function setReponseBonne(?string $reponseBonne): self{
    $this->reponseBonne = $reponseBonne;
    return $this;
}
public function setReponseMauvaise_1(?string $reponseMauvaise_1): self{
    $this->reponseMauvaise_1 = $reponseMauvaise_1;
    return $this;
}
public function setReponseMauvaise_2(?string $reponseMauvaise_2): self{
    $this->reponseMauvaise_2 = $reponseMauvaise_2;
    return $this;
}

}