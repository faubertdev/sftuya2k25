<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
#[ApiResource]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'adresse', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToOne(mappedBy: 'adresse', cascade: ['persist', 'remove'])]
    private ?Studio $studio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getAdresse() !== $this) {
            $user->setAdresse($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getStudio(): ?Studio
    {
        return $this->studio;
    }

    public function setStudio(?Studio $studio): static
    {
        // unset the owning side of the relation if necessary
        if ($studio === null && $this->studio !== null) {
            $this->studio->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($studio !== null && $studio->getAdresse() !== $this) {
            $studio->setAdresse($this);
        }

        $this->studio = $studio;

        return $this;
    }
}
