<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 */
class Plat
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
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $tarif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity=Typeplat::class, inversedBy="plats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_type_plat;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="plats")
     */
    private $fk_restaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getFkTypePlat(): ?typeplat
    {
        return $this->fk_type_plat;
    }

    public function setFkTypePlat(?typeplat $fk_type_plat): self
    {
        $this->fk_type_plat = $fk_type_plat;

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */

    public function getFkRestaurant(): ?Restaurant
    {
        return $this->fk_restaurant;
    }

    public function setFkRestaurant(?Restaurant $fk_restaurant): self
    {
        $this->fk_restaurant = $fk_restaurant;

        return $this;
    }
}
