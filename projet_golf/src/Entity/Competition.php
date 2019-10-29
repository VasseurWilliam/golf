<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitionRepository")
 */
class Competition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $listeJoueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Golf", inversedBy="competitions")
     */
    private $golf;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partie", mappedBy="competition")
     */
    private $partie;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $decalageDepart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichier;

    public function __construct()
    {
        $this->partie = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getListeJoueur(): ?string
    {
        return $this->listeJoueur;
    }

    public function setListeJoueur(string $listeJoueur): self
    {
        $this->listeJoueur = $listeJoueur;

        return $this;
    }

    public function getGolf(): ?Golf
    {
        return $this->golf;
    }

    public function setGolf(?Golf $golf): self
    {
        $this->golf = $golf;

        return $this;
    }

    /**
     * @return Collection|Partie[]
     */
    public function getPartie(): Collection
    {
        return $this->partie;
    }

    public function addPartie(Partie $partie): self
    {
        if (!$this->partie->contains($partie)) {
            $this->partie[] = $partie;
            $partie->setCompetition($this);
        }

        return $this;
    }

    public function removePartie(Partie $partie): self
    {
        if ($this->partie->contains($partie)) {
            $this->partie->removeElement($partie);
            // set the owning side to null (unless already changed)
            if ($partie->getCompetition() === $this) {
                $partie->setCompetition(null);
            }
        }

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getDecalageDepart(): ?\DateTimeInterface
    {
        return $this->decalageDepart;
    }

    public function setDecalageDepart(\DateTimeInterface $decalageDepart): self
    {
        $this->decalageDepart = $decalageDepart;

        return $this;
    }

    public function getFichier()
    {
        return $this->fichier;
    }

    public function setFichier( $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }


}
