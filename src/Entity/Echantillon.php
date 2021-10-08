<?php

namespace App\Entity;

use App\Repository\EchantillonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EchantillonRepository::class)
 */
class Echantillon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Patient2::class, inversedBy="echantillons")
     */
    private $Patient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Quantite;

    /**
     * @ORM\OneToMany(targetEntity=Analyse2::class, mappedBy="relation")
     */
    private $ListeAnalyses;

    public function __construct()
    {
        $this->ListeAnalyses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient2
    {
        return $this->Patient;
    }

    public function setPatient(?Patient2 $Patient): self
    {
        $this->Patient = $Patient;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->Quantite;
    }

    public function setQuantite(string $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    /**
     * @return Collection|Analyse2[]
     */
    public function getListeAnalyses(): Collection
    {
        return $this->ListeAnalyses;
    }

    public function addListeAnalysis(Analyse2 $listeAnalysis): self
    {
        if (!$this->ListeAnalyses->contains($listeAnalysis)) {
            $this->ListeAnalyses[] = $listeAnalysis;
            $listeAnalysis->setRelation($this);
        }

        return $this;
    }

    public function removeListeAnalysis(Analyse2 $listeAnalysis): self
    {
        if ($this->ListeAnalyses->removeElement($listeAnalysis)) {
            // set the owning side to null (unless already changed)
            if ($listeAnalysis->getRelation() === $this) {
                $listeAnalysis->setRelation(null);
            }
        }

        return $this;
    }
}
