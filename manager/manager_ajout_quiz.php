<?php
class manager_ajout_quiz extends ModelQuiz{

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

    //Fonction pour récupérer l'ensemble des catégories
    //Param : void
    //Return : array | string
    function readQuiz():array | string{
        //1) Création de l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //try...catch
        try{
            //2) Préparation de la requête
            $req = $bdd->prepare('SELECT id_quiz, title_quiz, description_quiz, img_quiz FROM quizs');

            //3) Execution de la requête
            $req->execute();

            //4) Récupération et renvoie de la réponse de la BDD
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    //Fonction pour récupérer un quiz par son nom
    //Param : string
    //Return : array | string
    function readQuizByName():array | string{
        //1) Création de l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=adrarquiz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Récupération du nom de la Catégorie depuis mon objet
        $title_quiz = $this->getTitleQuiz();

        //try...catch
        try{
            //2) Préparation de la requête
            $req = $bdd->prepare('SELECT id_quiz, title_quiz, description_quiz, img_quiz FROM quizs WHERE title_quiz = ?');

            //3) Binding de Paramètre
            $req->bindParam(1,$title_quiz,PDO::PARAM_STR);

            //4) Execution de la requête
            $req->execute();

            //5) Récupération et renvoie de la réponse de la BDD
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

}

