<?php
class ControlerList {
    private $utilisateurs;
    private $message;

    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
    public function setUtilisateurs($utilisateurs) 
    {
        $this->utilisateurs = $utilisateurs;
        return $this;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message) 
    {
        $this->message = $message;
        return $this;
    }

    public function __construct(){
        $this->message = "";
        $this->utilisateurs = "";
    }
    
   public function listUser(){
    $utilisateur = new ManagerUser(null);

       $users=$utilisateur->List_USER();
       if (gettype($users)=='array'){
            $this->boucle($users);
        }
        else {
            $this->setMessage($users);
        }
       
    }
        public function boucle($users):void{
            $liste_utilisateur=null;
        foreach($users as $user){
            $liste_utilisateur= $liste_utilisateur.$this->cards($user);
            }
            $this->setUtilisateurs($liste_utilisateur);
          
    
            
        }
        public function cards ($utilisateur){
         
            return "<article class='cards'>
                <div class='texte'>
                    <h3>Login : {$utilisateur['firstname_user']}</h3>
                    <h3>{$utilisateur['lastname_user']}</h3>
                    <p> {$utilisateur['email_user']}</p>
                </div>
            </article>";

        }
        
    
}


?>