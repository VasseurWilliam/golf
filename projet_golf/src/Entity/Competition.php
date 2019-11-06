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

    /**
     * @ORM\Column(type="time")
     */
    private $trou1;

    /**
     * @ORM\Column(type="time")
     */
    private $trou2;

    /**
     * @ORM\Column(type="time")
     */
    private $trou3;

    /**
     * @ORM\Column(type="time")
     */
    private $trou4;

    /**
     * @ORM\Column(type="time")
     */
    private $trou5;

    /**
     * @ORM\Column(type="time")
     */
    private $trou6;

    /**
     * @ORM\Column(type="time")
     */
    private $trou7;

    /**
     * @ORM\Column(type="time")
     */
    private $trou8;

    /**
     * @ORM\Column(type="time")
     */
    private $trou9;

    /**
     * @ORM\Column(type="time")
     */
    private $trou10;

    /**
     * @ORM\Column(type="time")
     */
    private $trou11;

    /**
     * @ORM\Column(type="time")
     */
    private $trou12;

    /**
     * @ORM\Column(type="time")
     */
    private $trou13;

    /**
     * @ORM\Column(type="time")
     */
    private $trou14;

    /**
     * @ORM\Column(type="time")
     */
    private $trou15;

    /**
     * @ORM\Column(type="time")
     */
    private $trou16;

    /**
     * @ORM\Column(type="time")
     */
    private $trou17;

    /**
     * @ORM\Column(type="time")
     */
    private $trou18;

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

    public function getTrou1(): ?\DateTimeInterface
    {
        return $this->trou1;
    }

    public function setTrou1(\DateTimeInterface $trou1): self
    {
        $this->trou1 = $trou1;

        return $this;
    }

    public function getTrou2(): ?\DateTimeInterface
    {
        return $this->trou2;
    }

    public function setTrou2(\DateTimeInterface $trou2): self
    {
        $this->trou2 = $trou2;

        return $this;
    }

    public function getTrou3(): ?\DateTimeInterface
    {
        return $this->trou3;
    }

    public function setTrou3(\DateTimeInterface $trou3): self
    {
        $this->trou3 = $trou3;

        return $this;
    }

    public function getTrou4(): ?\DateTimeInterface
    {
        return $this->trou4;
    }

    public function setTrou4(\DateTimeInterface $trou4): self
    {
        $this->trou4 = $trou4;

        return $this;
    }

    public function getTrou5(): ?\DateTimeInterface
    {
        return $this->trou5;
    }

    public function setTrou5(\DateTimeInterface $trou5): self
    {
        $this->trou5 = $trou5;

        return $this;
    }

    public function getTrou6(): ?\DateTimeInterface
    {
        return $this->trou6;
    }

    public function setTrou6(\DateTimeInterface $trou6): self
    {
        $this->trou6 = $trou6;

        return $this;
    }

    public function getTrou7(): ?\DateTimeInterface
    {
        return $this->trou7;
    }

    public function setTrou7(\DateTimeInterface $trou7): self
    {
        $this->trou7 = $trou7;

        return $this;
    }

    public function getTrou8(): ?\DateTimeInterface
    {
        return $this->trou8;
    }

    public function setTrou8(\DateTimeInterface $trou8): self
    {
        $this->trou8 = $trou8;

        return $this;
    }

    public function getTrou9(): ?\DateTimeInterface
    {
        return $this->trou9;
    }

    public function setTrou9(\DateTimeInterface $trou9): self
    {
        $this->trou9 = $trou9;

        return $this;
    }

    public function getTrou10(): ?\DateTimeInterface
    {
        return $this->trou10;
    }

    public function setTrou10(\DateTimeInterface $trou10): self
    {
        $this->trou10 = $trou10;

        return $this;
    }

    public function getTrou11(): ?\DateTimeInterface
    {
        return $this->trou11;
    }

    public function setTrou11(\DateTimeInterface $trou11): self
    {
        $this->trou11 = $trou11;

        return $this;
    }

    public function getTrou12(): ?\DateTimeInterface
    {
        return $this->trou12;
    }

    public function setTrou12(\DateTimeInterface $trou12): self
    {
        $this->trou12 = $trou12;

        return $this;
    }

    public function getTrou13(): ?\DateTimeInterface
    {
        return $this->trou13;
    }

    public function setTrou13(\DateTimeInterface $trou13): self
    {
        $this->trou13 = $trou13;

        return $this;
    }

    public function getTrou14(): ?\DateTimeInterface
    {
        return $this->trou14;
    }

    public function setTrou14(\DateTimeInterface $trou14): self
    {
        $this->trou14 = $trou14;

        return $this;
    }

    public function getTrou15(): ?\DateTimeInterface
    {
        return $this->trou15;
    }

    public function setTrou15(\DateTimeInterface $trou15): self
    {
        $this->trou15 = $trou15;

        return $this;
    }

    public function getTrou16(): ?\DateTimeInterface
    {
        return $this->trou16;
    }

    public function setTrou16(\DateTimeInterface $trou16): self
    {
        $this->trou16 = $trou16;

        return $this;
    }

    public function getTrou17(): ?\DateTimeInterface
    {
        return $this->trou17;
    }

    public function setTrou17(\DateTimeInterface $trou17): self
    {
        $this->trou17 = $trou17;

        return $this;
    }

    public function getTrou18(): ?\DateTimeInterface
    {
        return $this->trou18;
    }

    public function setTrou18(\DateTimeInterface $trou18): self
    {
        $this->trou18 = $trou18;

        return $this;
    }


}
