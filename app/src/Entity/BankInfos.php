<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BankInfosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BankInfosRepository::class)]
#[ApiResource]
class BankInfos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'bankinfos', cascade: ['persist', 'remove'])]
    private ?User $user = null;

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
            $this->user->setBankinfos(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getBankinfos() !== $this) {
            $user->setBankinfos($this);
        }

        $this->user = $user;

        return $this;
    }
}
