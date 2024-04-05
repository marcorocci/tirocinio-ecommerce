<?php

namespace App\Entity;

use App\Repository\VenditeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenditeRepository::class)
 */
class Vendite
{
    

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\Column(name="venditaId", type="integer")
     */
    private $venditaId;

    /**
     * @ORM\Column(name="dataVendita", type="datetime", nullable=true)
     */
    private $dataVendita;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prodotti")
     * @ORM\JoinColumn(name="idProdotto", referencedColumnName="id")
     */
    private $idProdotto;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantita;

    /**
     * @ORM\Column(name="prezzoTotale", type="decimal", precision=10, scale=2)
     */
    private $prezzoTotale;

    

    public function getVenditaId(): ?int
    {
        return $this->venditaId;
    }

    public function setVenditaId(int $venditaId): self
    {
        $this->venditaId = $venditaId;

        return $this;
    }

    public function getDataVendita(): ?\DateTimeInterface
    {
        return $this->dataVendita;
    }

    public function setDataVendita(?\DateTimeInterface $dataVendita): self
    {
        $this->dataVendita = $dataVendita;

        return $this;
    }

    public function getIdProdotto(): ?int
    {
        return $this->idProdotto;
    }

    public function setIdProdotto(int $idProdotto): self
    {
        $this->idProdotto = $idProdotto;

        return $this;
    }

    public function getQuantita(): ?int
    {
        return $this->quantita;
    }

    public function setQuantita(int $quantita): self
    {
        $this->quantita = $quantita;

        return $this;
    }

    public function getPrezzoTotale(): ?string
    {
        return $this->prezzoTotale;
    }

    public function setPrezzoTotale(string $prezzoTotale): self
    {
        $this->prezzoTotale = $prezzoTotale;

        return $this;
    }
}
