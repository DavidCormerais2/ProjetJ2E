<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeAnalyse;

    /**
     * @ORM\ManyToMany(targetEntity=Analyse::class)
     */
    private $ResultatAnalyse;

    public function __construct()
    {
        $this->ResultatAnalyse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getTypeAnalyse(): ?string
    {
        return $this->TypeAnalyse;
    }

    public function setTypeAnalyse(string $TypeAnalyse): self
    {
        $this->TypeAnalyse = $TypeAnalyse;

        return $this;
    }

    /**
     * @return Collection|Analyse[]
     */
    public function getResultatAnalyse(): Collection
    {
        return $this->ResultatAnalyse;
    }

    public function addResultatAnalyse(Analyse $resultatAnalyse): self
    {
        if (!$this->ResultatAnalyse->contains($resultatAnalyse)) {
            $this->ResultatAnalyse[] = $resultatAnalyse;
        }

        return $this;
    }

    public function removeResultatAnalyse(Analyse $resultatAnalyse): self
    {
        $this->ResultatAnalyse->removeElement($resultatAnalyse);

        return $this;
    }
}
