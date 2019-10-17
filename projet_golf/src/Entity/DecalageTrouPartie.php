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
    private $decalage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partie", inversedBy="decalageTrouPartie")
     */
    private $partie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trou", inversedBy="decalageTrouPartie")
     */
    private $trou;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDecalage(): ?int
    {
        return $this->decalage;
    }

    public function setDecalage(?int $decalage): self
    {
        $this->decalage = $decalage;

        return $this;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(?Partie $partie): self
    {
        $this->partie = $partie;

        return $this;
    }

    public function getTrou(): ?Trou
    {
        return $this->trou;
    }

    public function setTrou(?Trou $trou): self
    {
        $this->trou = $trou;

        return $this;
    }
}
