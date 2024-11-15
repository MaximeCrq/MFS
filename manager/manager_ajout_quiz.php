<?php
class manager_quiz extends ModelQuiz{

function addQuiz(){
    $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    try{
        //2nd Etape : préparer ma requête INSERT INTO
        $req = $bdd->prepare('INSERT INTO quizs (title_quiz, description_quiz, img_quiz) VALUES (?,?,?)');

        $title_quiz=$this->getTitleQuiz();
        $description_quiz =$this->getDescriptionQuiz();
        $img_quiz= $this->getImgQuiz();

        //3eme Etape : Binding de Paramètre
        $req->bindParam(1,$title_quiz,PDO::PARAM_STR);
        $req->bindParam(2,$description_quiz,PDO::PARAM_STR);
        $req->bindParam(3,$img_quiz,PDO::PARAM_STR);

        //4eme Etape : exécution de la requête
        $req->execute();

        //5eme Etape : Retourne un message de confirmation
        return "Le quiz ".$title_quiz." a été ajouté avec succès !";

    }catch(EXCEPTION $error){
            return $error->getMessage();
    }
}
}
