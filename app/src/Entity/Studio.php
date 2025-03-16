<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StudioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudioRepository::class)]
#[ApiResource]
class Studio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'studio', cascade: ['persist', 'remove'])]
    private ?Adresse $adresse = null;

    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: LocalProduct::class)]
    private Collection $localProduct;

    public function __construct()
    {
        $this->localProduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, LocalProduct>
     */
    public function getLocalProduct(): Collection
    {
        return $this->localProduct;
    }

    public function addLocalProduct(LocalProduct $localProduct): static
    {
        if (!$this->localProduct->contains($localProduct)) {
            $this->localProduct->add($localProduct);
            $localProduct->setStudio($this);
        }

        return $this;
    }

    public function removeLocalProduct(LocalProduct $localProduct): static
    {
        if ($this->localProduct->removeElement($localProduct)) {
            // set the owning side to null (unless already changed)
            if ($localProduct->getStudio() === $this) {
                $localProduct->setStudio(null);
            }
        }

        return $this;
    }
}
