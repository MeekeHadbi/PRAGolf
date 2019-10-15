<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DecalageTrouPartieRepository")
 */
class DecalageTrouPartie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempsDecalage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTempsDecalage(): ?int
    {
        return $this->tempsDecalage;
    }

    public function setTempsDecalage(?int $tempsDecalage): self
    {
        $this->tempsDecalage = $tempsDecalage;

        return $this;
    }
}
