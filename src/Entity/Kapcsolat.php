<?php

namespace App\Entity;

class Kapcsolat
{
    protected $nev;
    protected $email;
    protected $uzenet;

    //név
    public function getNev(): string
    {
        return $this->nev;
    }
    public function setNev(string $nev): void
    {
        $this->nev = $nev;
    }

    //email
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    //üzenet
    public function getUzenet(): string
    {
        return $this->uzenet;
    }
    public function setUzenet(string $uzenet): void
    {
        $this->uzenet = $uzenet;
    }
}
