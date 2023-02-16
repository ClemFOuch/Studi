<?php
namespace App\Model;

class Contact {
    
    /**
     * @var int
     */
    private $id;
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
    /**
     * @var string
     */
    private $object;
    /**
     * @var string
     */
    private $message;

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

    
    public function getId(): ?int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
 
    public function getObject(): ?string
    {
        return $this->object;
    }
 
    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }
}