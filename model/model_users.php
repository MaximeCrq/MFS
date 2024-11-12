<?php
class ModelUser{
    //Attribut
    private ?int $idUser;
    private ?string $nameUser;
    private ?string $firstNameUser;
    private ?string $loginUser;
    private ?string $mdpUser;

    

    //Constructeur
    public function __construct(?string $login){
        $this->loginUser = $login;
    }

}