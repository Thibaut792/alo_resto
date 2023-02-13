<?php

namespace App\Entity;

use App\Repository\LivreurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreurRepository::class)
 */
class Livreur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteur;

    /**
     * @ORM\OneToMany(targetEntity=Livraison::class, mappedBy="fk_livreur")
     */
    private $livraisons;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="livreurs")
     */
    private $fk_user;

    /**
     * @ORM\ManyToOne(targetEntity=Typevehicule::class, inversedBy="livreurs")
     */
    private $fk_type_vehicule;

    public function __construct()
    {
        $this->livraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setFkLivreur($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getFkLivreur() === $this) {
                $livraison->setFkLivreur(null);
            }
        }

        return $this;
    }

    public function getFkUser(): ?User
    {
        return $this->fk_user;
    }

    public function setFkUser(?User $fk_user): self
    {
        $this->fk_user = $fk_user;

        return $this;
    }

    public function getFkTypeVehicule(): ?typevehicule
    {
        return $this->fk_type_vehicule;
    }

    public function setFkTypeVehicule(?typevehicule $fk_type_vehicule): self
    {
        $this->fk_type_vehicule = $fk_type_vehicule;

        return $this;
    }
}
