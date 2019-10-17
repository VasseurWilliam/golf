<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParcoursRepository")
 */
class Parcours
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Golf", inversedBy="parcours")
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
