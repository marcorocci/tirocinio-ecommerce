<?php

namespace App\Entity;

use App\Repository\PromozioniRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromozioniRepository::class)
 */
class Promozioni
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codicePromozionale;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $sconto;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataInizio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataFine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodicePromozionale(): ?string
    {
        return $this->codicePromozionale;
    }

    public function setCodicePromozionale(string $codicePromozionale): self
    {
        $this->codicePromozionale = $codicePromozionale;

        return $this;
    }

    public function getSconto(): ?string
    {
        return $this->sconto;
    }

    public function setSconto(string $sconto): self
    {
        $this->sconto = $sconto;

        return $this;
    }

    public function getDataInizio(): ?\DateTimeInterface
    {
        return $this->dataInizio;
    }

    public function setDataInizio(\DateTimeInterface $dataInizio): self
    {
        $this->dataInizio = $dataInizio;

        return $this;
    }

    public function getDataFine(): ?\DateTimeInterface
    {
        return $this->dataFine;
    }

    public function setDataFine(\DateTimeInterface $dataFine): self
    {
        $this->dataFine = $dataFine;

        return $this;
    }
}
