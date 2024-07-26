<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $allergie = null;

    #[ORM\OneToMany(targetEntity: Compose::class, mappedBy: 'ingredient')]
    private Collection $composes;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: EtapeCompose::class, mappedBy: 'ingredient')]
    private Collection $etapeComposes;

    public function __construct()
    {
        $this->qte = new ArrayCollection();
        $this->composes = new ArrayCollection();
        $this->etapeComposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->allergie;
    }

    public function setAllergie(string $allergie): static
    {
        $this->allergie = $allergie;

        return $this;
    }

    /**
     * @return Collection<int, Compose>
     */
    public function getComposes(): Collection
    {
        return $this->composes;
    }

    public function addCompose(Compose $compose): static
    {
        if (!$this->composes->contains($compose)) {
            $this->composes->add($compose);
            $compose->setIngredient($this);
        }

        return $this;
    }

    public function removeCompose(Compose $compose): static
    {
        if ($this->composes->removeElement($compose)) {
            // set the owning side to null (unless already changed)
            if ($compose->getIngredient() === $this) {
                $compose->setIngredient(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, EtapeCompose>
     */
    public function getEtapeComposes(): Collection
    {
        return $this->etapeComposes;
    }

    public function addEtapeCompose(EtapeCompose $etapeCompose): static
    {
        if (!$this->etapeComposes->contains($etapeCompose)) {
            $this->etapeComposes->add($etapeCompose);
            $etapeCompose->setIngredient($this);
        }

        return $this;
    }

    public function removeEtapeCompose(EtapeCompose $etapeCompose): static
    {
        if ($this->etapeComposes->removeElement($etapeCompose)) {
            // set the owning side to null (unless already changed)
            if ($etapeCompose->getIngredient() === $this) {
                $etapeCompose->setIngredient(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
