<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivraisonRepository::class)
 */
class Livraison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteur;

    /**
     * @ORM\ManyToOne(targetEntity=restaurant::class, inversedBy="livraisons")
     */
    private $fk_restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=SuivieDeCommande::class, inversedBy="livraisons")
     */
    private $fk_suivi_commande;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="livraisons")
     */
    private $fk_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
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

    public function getFkRestaurant(): ?restaurant
    {
        return $this->fk_restaurant;
    }

    public function setFkRestaurant(?restaurant $fk_restaurant): self
    {
        $this->fk_restaurant = $fk_restaurant;

        return $this;
    }

    public function getFkSuiviCommande(): ?suiviedecommande
    {
        return $this->fk_suivi_commande;
    }

    public function setFkSuiviCommande(?suiviedecommande $fk_suivi_commande): self
    {
        $this->fk_suivi_commande = $fk_suivi_commande;

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
}
