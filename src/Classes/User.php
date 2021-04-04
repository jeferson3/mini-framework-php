<?php

namespace App\Classes;
use JsonSerializable;

class User implements JsonSerializable
{
    private string $name;
    private string $email;
    private string $password;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            "nome"=>$this->name,
            "email"=>$this->email,
            "password"=>$this->password,
        ];
    }
}
