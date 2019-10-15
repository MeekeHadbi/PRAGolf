<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartieRepository")
 */
class Partie
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
    private $nombreJoueur;

    /**
     * @ORM\Column(type="integer")
     */
    private $idJoueur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreJoueur(): ?int
    {
        return $this->nombreJoueur;
    }

    public function setNombreJoueur(int $nombreJoueur): self
    {
        $this->nombreJoueur = $nombreJoueur;

        return $this;
    }

    public function getIdJoueur(): ?int
    {
        return $this->idJoueur;
    }

    public function setIdJoueur(int $idJoueur): self
    {
        $this->idJoueur = $idJoueur;

        return $this;
    }
}
