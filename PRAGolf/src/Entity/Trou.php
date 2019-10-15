<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrouRepository")
 */
class Trou
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
    private $par;

    /**
     * @ORM\Column(type="integer")
     */
    private $tempsJeu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempsMarche;

    /**
     * @ORM\Column(type="integer")
     */
    private $tempsTotal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPar(): ?int
    {
        return $this->par;
    }

    public function setPar(int $par): self
    {
        $this->par = $par;

        return $this;
    }

    public function getTempsJeu(): ?int
    {
        return $this->tempsJeu;
    }

    public function setTempsJeu(int $tempsJeu): self
    {
        $this->tempsJeu = $tempsJeu;

        return $this;
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

    public function getTempsMarche(): ?int
    {
        return $this->tempsMarche;
    }

    public function setTempsMarche(?int $tempsMarche): self
    {
        $this->tempsMarche = $tempsMarche;

        return $this;
    }

    public function getTempsTotal(): ?int
    {
        return $this->tempsTotal;
    }

    public function setTempsTotal(int $tempsTotal): self
    {
        $this->tempsTotal = $tempsTotal;

        return $this;
    }
}
