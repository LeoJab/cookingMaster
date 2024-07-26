<?php

namespace App\Entity;

use App\Repository\EtapeComposeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeComposeRepository::class)]
class EtapeCompose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'etapeComposes')]
    private ?ingredient $ingredient = null;

    #[ORM\ManyToOne(inversedBy: 'etapeComposes')]
    private ?etape $etape = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEtape(): ?etape
    {
        return $this->etape;
    }

    public function setEtape(?etape $etape): static
    {
        $this->etape = $etape;

        return $this;
    }
}
