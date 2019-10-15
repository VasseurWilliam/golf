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
    private $numero;

    /**
     * @ORM\Column(type="integer")
     */
    private $par;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tempsDeplacement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Golf", inversedBy="trous")
     * @ORM\JoinColumn(nullable=false)
     */
    private $golf;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
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

    public function getTempsDeplacement(): ?string
    {
        return $this->tempsDeplacement;
    }

    public function setTempsDeplacement(string $tempsDeplacement): self
    {
        $this->tempsDeplacement = $tempsDeplacement;

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
