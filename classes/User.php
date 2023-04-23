<?php

final class User
{
    private ?int $id = null;
    private ?string $firstname = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $profilePicture = null;
    public array $props = ['id', 'firstname', 'email', 'password', 'profilePicture'];

    public function __construct()
    {
        foreach ($this as $key => $value) {
            if (isset($_SESSION[$key]))
                $this->$key = $_SESSION[$key];
        }
    }

    public function instantiation(array $params): void
    {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function getProfilePicturePath(): string
    {
        return '../profile_pics/' . $this->profilePicture;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $name): void
    {
        $this->firstname = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
