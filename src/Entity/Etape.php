<?php

namespace App\Entity;

use App\Repository\EtapeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeRepository::class)]
class Etape
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenue = null;

    #[ORM\OneToMany(targetEntity: EtapeCompose::class, mappedBy: 'etape', cascade: ['persist', 'remove'])]
    private Collection $etapeComposes;

    #[ORM\ManyToOne(inversedBy: 'etapes')]
    private ?recette $recette = null;

    public function __construct()
    {
        $this->etapeComposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(string $contenue): static
    {
        $this->contenue = $contenue;

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
            $etapeCompose->setEtape($this);
        }

        return $this;
    }

    public function removeEtapeCompose(EtapeCompose $etapeCompose): static
    {
        if ($this->etapeComposes->removeElement($etapeCompose)) {
            // set the owning side to null (unless already changed)
            if ($etapeCompose->getEtape() === $this) {
                $etapeCompose->setEtape(null);
            }
        }

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
}
