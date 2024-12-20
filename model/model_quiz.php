<?php
class ModelQuiz{

//Constructeur
public function __construct($title_quiz, $description_quiz, $img_quiz){
    // $id_quiz="";
    // $categorie_quiz="";
    $this->title_quiz = $title_quiz;
    $this->description_quiz = $description_quiz;
    $this->img_quiz = $img_quiz;
}

//Attributs 
    private ?int $id_quiz;
    private ?int $categorie_quiz;
    private ?string $title_quiz;
    private ?string $description_quiz;
    private ?string $img_quiz;

// Getter et Setter 
public function getIdQuiz(): ?int{
        return $this->id_quiz;
}
public function getCategorieQuiz(): ?string{
    return $this->categorie_quiz;
}
public function getTitleQuiz(): ?string{
        return $this->title_quiz;
}
public function getDescriptionQuiz(): ?string{
    return $this->description_quiz;
}
public function getImgQuiz(): ?string{   
    return $this->img_quiz;
}

public function setIdQuiz(?int $id_quiz): self{
        $this->id = $id_quiz;
        return $this;
}
public function setCategorieQuiz(?string $categorie_quiz): self{
    $this->categorie_quiz = $categorie_quiz;
    return $this;
}
public function setTitleQuiz(?string $title_quiz): self{
    $this->title_quiz = $title_quiz;
    return $this;
}
public function setDescriptionQuiz(?string $description_quiz): self{
    $this->description_quiz = $description_quiz;
    return $this;
}
public function setImgQuiz(?string $img_quiz): self{
    $this->img_quiz = $img_quiz;
    return $this;
}
}