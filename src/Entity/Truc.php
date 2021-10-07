<?php

namespace App\Entity;

use App\Repository\TrucRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrucRepository::class)
 * @ORM\Table(name="trucs")
 */
class Truc
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="chose", type="string", length=255, nullable=true)
     */
    private $bidule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBidule(): ?string
    {
        return $this->bidule;
    }

    public function setBidule(?string $bidule): self
    {
        $this->bidule = $bidule;

        return $this;
    }
}
