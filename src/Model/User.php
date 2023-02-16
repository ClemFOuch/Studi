<?php
namespace App\Model;

class User {
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $passwordbis;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $role;
    /**
     * @var string
     */
    private $userName;
    /**
     * @var string
     */
    private $userSurname;
    /**
     * @var string
     */
    private $usersociety;
    
    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
 
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
 
    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }
 
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserSurname(): ?string
    {
        return $this->userSurname;
    }

    public function setUserSurname(string $userSurname): self
    {
        $this->userSurname = $userSurname;

        return $this;
    }

    public function getUsersociety(): ?string
    {
        return $this->usersociety;
    }

    public function setUsersociety(string $usersociety):self
    {
        $this->usersociety = $usersociety;

        return $this;
    }

    
    public function getPasswordbis(): ?string
    {
        return $this->passwordbis;
    }


    public function setPasswordbis(string $passwordbis): self
    {
        $this->passwordbis = $passwordbis;

        return $this;
    }
}