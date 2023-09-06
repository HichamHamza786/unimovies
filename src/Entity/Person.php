<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\OneToMany(mappedBy: 'person', targetEntity: Casting::class, orphanRemoval: true)]
    private Collection $casting;

    public function __construct()
    {
        $this->casting = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return Collection<int, Casting>
     */
    public function getCasting(): Collection
    {
        return $this->casting;
    }

    public function addCasting(Casting $casting): static
    {
        if (!$this->casting->contains($casting)) {
            $this->casting->add($casting);
            $casting->setPerson($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): static
    {
        if ($this->casting->removeElement($casting)) {
            // set the owning side to null (unless already changed)
            if ($casting->getPerson() === $this) {
                $casting->setPerson(null);
            }
        }

        return $this;
    }
}
