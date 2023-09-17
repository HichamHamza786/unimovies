<?php

namespace App\Entity;

use App\Repository\CastingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CastingRepository::class)]
class Casting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['movies'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['movies'])]
    private ?string $role = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Groups(['movies'])]
    private ?int $creditOrder = null;

    #[ORM\ManyToOne(targetEntity:Person::class, inversedBy: 'castings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\ManyToOne(targetEntity:Movie::class, inversedBy: 'castings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movie $movie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getCreditOrder(): ?int
    {
        return $this->creditOrder;
    }

    public function setCreditOrder(int $creditOrder): static
    {
        $this->creditOrder = $creditOrder;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): static
    {
        $this->movie = $movie;

        return $this;
    }
}
