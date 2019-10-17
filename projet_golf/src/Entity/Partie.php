<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $nbJoueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="partie")
     */
    private $competition;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DecalageTrouPartie", mappedBy="partie")
     */
    private $decalageTrouPartie;

    public function __construct()
    {
        $this->decalageTrouPartie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * @return Collection|DecalageTrouPartie[]
     */
    public function getDecalageTrouPartie(): Collection
    {
        return $this->decalageTrouPartie;
    }

    public function addDecalageTrouPartie(DecalageTrouPartie $decalageTrouPartie): self
    {
        if (!$this->decalageTrouPartie->contains($decalageTrouPartie)) {
            $this->decalageTrouPartie[] = $decalageTrouPartie;
            $decalageTrouPartie->setPartie($this);
        }

        return $this;
    }

    public function removeDecalageTrouPartie(DecalageTrouPartie $decalageTrouPartie): self
    {
        if ($this->decalageTrouPartie->contains($decalageTrouPartie)) {
            $this->decalageTrouPartie->removeElement($decalageTrouPartie);
            // set the owning side to null (unless already changed)
            if ($decalageTrouPartie->getPartie() === $this) {
                $decalageTrouPartie->setPartie(null);
            }
        }

        return $this;
    }
}
