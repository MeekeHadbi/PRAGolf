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
     * @ORM\Column(type="integer")
     */
    private $decalageMin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDecalageMin(): ?int
    {
        return $this->decalageMin;
    }

    public function setDecalageMin(int $decalageMin): self
    {
        $this->decalageMin = $decalageMin;

        return $this;
    }
}
