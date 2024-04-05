<?php

namespace App\Entity;

use App\Repository\CheckoutRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CheckoutRepository::class)
 */
class Checkout
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $aggiunto;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantita;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prodotti")
     * @ORM\JoinColumn(name="idProdotto", referencedColumnName="id")
     */
    private $idProdotto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAggiunto(): ?\DateTimeInterface
    {
        return $this->aggiunto;
    }

    public function setAggiunto(?\DateTimeInterface $aggiunto): self
    {
        $this->aggiunto = $aggiunto;

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

    public function getIdProdotto(): ?int
    {
        return $this->idProdotto;
    }

    public function setIdProdotto(?int $idProdotto): self
    {
        $this->idProdotto = $idProdotto;

        return $this;
    }
}
