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
     * @ORM\Column(type="integer")
     */
    private $tempsDeMarche;

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

    public function getTempsDeMarche(): ?int
    {
        return $this->tempsDeMarche;
    }

    public function setTempsDeMarche(int $tempsDeMarche): self
    {
        $this->tempsDeMarche = $tempsDeMarche;

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
