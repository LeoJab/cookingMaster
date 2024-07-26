<?php

namespace App\Entity;

use App\Repository\ComposeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposeRepository::class)]
class Compose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $qte = null;

    #[ORM\Column(length: 255)]
    private ?string $unite = null;

    #[ORM\ManyToOne(inversedBy: 'composes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Recette $recette = null;

    #[ORM\ManyToOne(inversedBy: 'composes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredient $ingredient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): static
    {
        $this->qte = $qte;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    public function getRecette(): ?recette
    {
        return $this->recette;
    }

    public function setRecette(?recette $recette): static
    {
        $this->recette = $recette;

        return $this;
    }

    public function getIngredient(): ?ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?ingredient $ingredient): static
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function __toString()
    {
        return $this->ingredient;
    }
}
