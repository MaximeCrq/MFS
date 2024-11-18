<?php
class ModelUser{
    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $password;
    private ?int $roles;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): ModelUser
    {
        $this->id = $id;
        return $this;
    }
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): ModelUser
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): ModelUser
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): ModelUser
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): ModelUser
    {
        $this->password = $password;
        return $this;
    }

    public function getRoles(): ?int
    {
        return $this->roles;
    }

    public function setRoles(?int $roles): ModelUser
    {
        $this->roles = $roles;
        return $this;
    }

    //Constructeur
    public function __construct(?string $login){
        $this->email=$login;
    }

}