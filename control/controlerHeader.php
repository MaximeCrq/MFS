<?php
class ControlerHeader{
    private ?string $class;
    private ?string $classNav;
    private ?string $classUser;

    public function __construct(){
        $this->class = "";
        $this->classNav = "displayNone";
        $this->classUser = "displayNone";
    }

    public function getClass(): ?string { return $this->class; }
    public function setClass(?string $class): self { $this->class = $class; return $this; }

    public function getClassNav(): ?string { return $this->classNav; }
    public function setClassNav(?string $classNav): self { $this->classNav = $classNav; return $this; }

    public function getClassUser(): ?string { return $this->classUser; }
    public function setClassUser(?string $classUser): self { $this->classUser = $classUser; return $this; }



    public function displayNav():void{
        
        if(isset($_SESSION['id_user'])){
            $this->setClass("displayNone");
            $this->setClassNav("");
        }
    }

    public function role(){
        if(isset($_SESSION['role'])){
            if ($_SESSION['role']==1){
                $this->setClassUser("");
            }
        }
        
    }

}
?>