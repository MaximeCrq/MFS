<?php
class ControlerListBan {
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

       $users=$utilisateur->banUSER();
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
         
            return "<article class='cardBan'>
                <form action='' method='post'>
                    <div class='texte'>
                        <h3>Prénom: {$utilisateur['firstname_user']}</h3>
                        <h3>Nom: {$utilisateur['lastname_user']}</h3> 
                        <p>Login :{$utilisateur['email_user']}</p>
                        <input type='hidden' value=`{$utilisateur['email_user']}` name ='crevette'/>
                    </div>
                    <input type='submit' value='unban' name=unban/>
                    
                </form>
            </article>";

        }
        function val(){
            $enregistrement=$_POST["crevette"];
            return $enregistrement;
        }
        
        function modification(){
            if(isset($_post["unban"])){
                echo $this->val();
                // $verification=new ManagerUser(null);
                // $verification->setEmail();
                // $verification->USER();
             
            }
        }
    
}


?>