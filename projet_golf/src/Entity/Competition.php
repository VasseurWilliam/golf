<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Golf", inversedBy="competition")
     */
    private $golf;


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


}
