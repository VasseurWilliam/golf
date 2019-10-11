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
}
