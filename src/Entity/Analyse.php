<?php

namespace App\Entity;

use App\Repository\AnalyseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnalyseRepository::class)
 * @ORM\Table(name="`analyse`")
 */
class Analyse
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
     * @ORM\Column(type="string", length=255)
     */
    private $Unit;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Normal;

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

    public function getUnit(): ?string
    {
        return $this->Unit;
    }

    public function setUnit(string $Unit): self
    {
        $this->Unit = $Unit;

        return $this;
    }

    public function getNormal(): ?bool
    {
        return $this->Normal;
    }

    public function setNormal(?bool $Normal): self
    {
        $this->Normal = $Normal;

        return $this;
    }
}
