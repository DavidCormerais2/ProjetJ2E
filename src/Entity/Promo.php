<?php

namespace App\Entity;

use App\Repository\PromoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromoRepository::class)
 * @ORM\Table(name="promos")
 */
class Promo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="intitule", type="string", length=255, nullable=false)
     */
    private $Intitule;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="Promo")
     */
    private $ListeEtu;

    public function __construct()
    {
        $this->ListeEtu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->Intitule;
    }

    public function setIntitule(string $Intitule): self
    {
        $this->Intitule = $Intitule;

        return $this;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getListeEtu(): Collection
    {
        return $this->ListeEtu;
    }

    public function addListeEtu(Etudiant $listeEtu): self
    {
        if (!$this->ListeEtu->contains($listeEtu)) {
            $this->ListeEtu[] = $listeEtu;
            $listeEtu->setPromo($this);
        }

        return $this;
    }

    public function removeListeEtu(Etudiant $listeEtu): self
    {
        if ($this->ListeEtu->removeElement($listeEtu)) {
            // set the owning side to null (unless already changed)
            if ($listeEtu->getPromo() === $this) {
                $listeEtu->setPromo(null);
            }
        }

        return $this;
    }
}
