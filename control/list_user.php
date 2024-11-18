<?php
class ControlerList {
    private $utilisateurs;


    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
    public function setUtilisateurs($utilisateurs)
    {
        $this->utilisateurs = $utilisateurs;
        return $this;
    }

    
   public function listUser(){
    $utilisateur = new ManagerUser(null);
       $users=$utilisateur->List_USER();
       $this->boucle($users);
       
    }
        public function boucle($users):void{
        foreach($users as $user){
            $liste_utilisateur= $liste_utilisateur.$this->cards($user);
            }
            $this->setUtilisateurs($liste_utilisateur);
        }
        public function cards ($utilisateur){
            return "<article style='border-bottom : 3px solid>
                <h3>Login : {$utilisateur['login_user']}</h3>
                <p>Nom - Prénom : {$utilisateur['name_user']} - {$utilisateur['first_name_user']}</p>
            </article>";
        }
    
}


?>