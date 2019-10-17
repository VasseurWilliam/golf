<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GolfRepository")
 */
class Golf
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
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="integer")
     */
    private $parTotal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trou", mappedBy="golf", orphanRemoval=true)
     */
    private $trous;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Competition", mappedBy="golf")
     */
    private $competitions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Parcours", mappedBy="golf")
     */
    private $parcours;

    public function __construct()
    {
        $this->trous = new ArrayCollection();
        $this->competitions = new ArrayCollection();
        $this->parcours = new ArrayCollection();
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


    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getParTotal(): ?int
    {
        return $this->parTotal;
    }

    public function setParTotal(int $parTotal): self
    {
        $this->parTotal = $parTotal;

        return $this;
    }

    /**
     * @return Collection|Trou[]
     */
    public function getTrous(): Collection
    {
        return $this->trous;
    }

    public function addTrou(Trou $trou): self
    {
        if (!$this->trous->contains($trou)) {
            $this->trous[] = $trou;
            $trou->setGolf($this);
        }

        return $this;
    }

    public function removeTrou(Trou $trou): self
    {
        if ($this->trous->contains($trou)) {
            $this->trous->removeElement($trou);
            // set the owning side to null (unless already changed)
            if ($trou->getGolf() === $this) {
                $trou->setGolf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competition[]
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions[] = $competition;
            $competition->setGolf($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->contains($competition)) {
            $this->competitions->removeElement($competition);
            // set the owning side to null (unless already changed)
            if ($competition->getGolf() === $this) {
                $competition->setGolf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getParcours(): Collection
    {
        return $this->parcours;
    }

    public function addParcour(Parcours $parcour): self
    {
        if (!$this->parcours->contains($parcour)) {
            $this->parcours[] = $parcour;
            $parcour->setGolf($this);
        }

        return $this;
    }

    public function removeParcour(Parcours $parcour): self
    {
        if ($this->parcours->contains($parcour)) {
            $this->parcours->removeElement($parcour);
            // set the owning side to null (unless already changed)
            if ($parcour->getGolf() === $this) {
                $parcour->setGolf(null);
            }
        }

        return $this;
    }


}
