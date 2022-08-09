<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

use App\Repository\KapcsolatEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Mime\Message;

#[ORM\Entity(repositoryClass: KapcsolatEntityRepository::class)]
class KapcsolatEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nev = null;

    #[ORM\Column(length: 150)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $uzenet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNev(): ?string
    {
        return $this->nev;
    }

    public function setNev(string $nev): self
    {
        $this->nev = $nev;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUzenet(): ?string
    {
        return $this->uzenet;
    }

    public function setUzenet(string $uzenet): self
    {
        $this->uzenet = $uzenet;

        return $this;
    }
}
