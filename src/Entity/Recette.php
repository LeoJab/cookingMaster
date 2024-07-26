<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Notation;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    #[ORM\Column]
    private ?int $temps = null;

    #[ORM\Column(length: 255)]
    private ?string $diff = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'recette', cascade: ['persist', 'remove'])]
    private Collection $commentaires;

    #[ORM\OneToMany(targetEntity: Compose::class, mappedBy: 'recette', cascade: ['persist', 'remove'])]
    private Collection $composes;

    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'recette', cascade: ['persist', 'remove'])]
    private Collection $photos;

    #[ORM\OneToMany(targetEntity: Etape::class, mappedBy: 'recette', cascade: ['persist', 'remove'])]
    private Collection $etapes;

    #[ORM\OneToMany(targetEntity: Favorie::class, mappedBy: 'recette', cascade: ['persist', 'remove'])]
    private Collection $favories;

    #[ORM\OneToMany(targetEntity: notation::class, mappedBy: 'recette', cascade: ['persist', 'remove'])]
    private Collection $notation;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->ingredient = new ArrayCollection();
        $this->composes = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->etapes = new ArrayCollection();
        $this->notation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getTemps(): ?int
    {
        return $this->temps;
    }

    public function setTemps(int $temps): static
    {
        $this->temps = $temps;

        return $this;
    }

    public function getDiff(): ?string
    {
        return $this->diff;
    }

    public function setDiff(string $diff): static
    {
        $this->diff = $diff;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setRecette($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getRecette() === $this) {
                $commentaire->setRecette(null);
            }
        }

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
            $compose->setRecette($this);
        }

        return $this;
    }

    public function removeCompose(Compose $compose): static
    {
        if ($this->composes->removeElement($compose)) {
            // set the owning side to null (unless already changed)
            if ($compose->getRecette() === $this) {
                $compose->setRecette(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setRecette($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getRecette() === $this) {
                $photo->setRecette(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Etape>
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(Etape $etape): static
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes->add($etape);
            $etape->setRecette($this);
        }

        return $this;
    }

    public function removeEtape(Etape $etape): static
    {
        if ($this->etapes->removeElement($etape)) {
            // set the owning side to null (unless already changed)
            if ($etape->getRecette() === $this) {
                $etape->setRecette(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getMoyenneNotation(): ?float
    {
        $count = 0; 
        $total = $this->getNotation()->count();
        
        if($total > 0) {
            foreach($this->getNotation()->getValues() as $notation){ 
                $note = $notation->getValue() ;  
                $count += $note; 
            } 
            
            return $count / $total;
        }
        return 0;
    }

    /* * Récupère la moyenne d'un produit * @param Product $product * @return int 
    public function getAvgByProduct(Product $product): int 
    { 
        $qb = $this->createQueryBuilder('pr'); 
        $qb->select('AVG(pr.rating) AS avg') 
            ->where($qb->expr()->eq('pr.product', $product->getId())); 
        $result = $qb->getQuery()?->getSingleScalarResult(); 
        return $result !== null ? $result : 5; 
    } */

    /**
     * @return Collection<int, notation>
     */
    public function getNotation(): Collection
    {
        return $this->notation;
    }

    public function addNotation(notation $notation): static
    {
        if (!$this->notation->contains($notation)) {
            $this->notation->add($notation);
            $notation->setRecette($this);
        }

        return $this;
    }

    public function removeNotation(notation $notation): static
    {
        if ($this->notation->removeElement($notation)) {
            // set the owning side to null (unless already changed)
            if ($notation->getRecette() === $this) {
                $notation->setRecette(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
