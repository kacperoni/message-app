<?php

final class User
{
    private ?int $id = null;
    private ?string $firstname = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $profilePicture = null;
    private ?bool $active = null;
    private ?Database $database = null;
    private ?string $lastSeen = null;
    public array $props = ['id', 'firstname', 'email', 'password', 'profilePicture', 'active', 'lastSeen'];

    public function __construct(Database $database)
    {
        foreach ($this as $key => $value) {
            if ($key == 'database') $this->$key = $database;
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

    public function setUserLoggedIn(): void
    {
        $this->active = true;
        $sql = "UPDATE users SET active = ? WHERE id = ?";
        $this->database->query($sql, [1, $this->id]);
    }

    public function setUserLoggedOut(): void
    {
        $sql = "UPDATE users SET active = ?, lastSeen = NOW() WHERE id = ?";
        $this->database->query($sql, [0, $this->id]);
        $this->active = false;
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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getLastSeen(): ?string
    {
        return $this->lastSeen;
    }
}
