<?php

namespace App\Entity;

use App\Repository\Analyse2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Analyse2Repository::class)
 */
class Analyse2
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
    private $Type;

    /**
     * @ORM\Column(type="float")
     */
    private $Resultat;

    /**
     * @ORM\ManyToOne(targetEntity=Echantillon::class, inversedBy="ListeAnalyses")
     */
    private $Echantillon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getResultat(): ?float
    {
        return $this->Resultat;
    }

    public function setResultat(float $Resultat): self
    {
        $this->Resultat = $Resultat;

        return $this;
    }

    public function getEchantillon(): ?Echantillon
    {
        return $this->Echantillon;
    }

    public function setEchantillon(?Echantillon $Echantillon): self
    {
        $this->Echantillon = $Echantillon;

        return $this;
    }
}
