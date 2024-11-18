<?php
class ControlerListAdmin {
    private $administrateur;
    private $message;

    public function getAdministrateur()
    {
        return $this->administrateur;
    }
    public function setAdministrateur($administrateur) 
    {
        $this->administrateur = $administrateur;
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
        $this->administrateur = "";
    }
    
   public function listUser(){
    $utilisateur = new ManagerUser(null);

       $users=$utilisateur->adminUSER();
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
            $this->setAdministrateur($liste_utilisateur);
          
    
            
        }
        public function cards ($utilisateur){
         
            return "<article class='cardBan'>
                <div class='texte'>
                    <h3>Prénom: {$utilisateur['firstname_user']}</h3>
                    <h3>Nom: {$utilisateur['lastname_user']}</h3> 
                    <p>Login :{$utilisateur['email_user']}</p>
                </div>
                <input type='submit' value='unban'/>
            </article>";

        }
    
}


?>