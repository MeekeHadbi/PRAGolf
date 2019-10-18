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
    private $idJoueur;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbJoueur;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNbJoueur(): ?int
    {
        return $this->nbJoueur;
    }

    public function setNbJoueur(int $nbJoueur): self
    {
        $this->nbJoueur = $nbJoueur;

        return $this;
    }
}
