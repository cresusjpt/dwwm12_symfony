<?php

namespace App\Entity;

use App\Repository\DetailCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailCommandeRepository::class)
 */
class DetailCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty_buy;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="detailCommandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_buy;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="detailCommandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $in_order;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQtyBuy(): ?int
    {
        return $this->qty_buy;
    }

    public function setQtyBuy(int $qty_buy): self
    {
        $this->qty_buy = $qty_buy;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getProductBuy(): ?Product
    {
        return $this->product_buy;
    }

    public function setProductBuy(?Product $product_buy): self
    {
        $this->product_buy = $product_buy;

        return $this;
    }

    public function getInOrder(): ?Commande
    {
        return $this->in_order;
    }

    public function setInOrder(?Commande $in_order): self
    {
        $this->in_order = $in_order;

        return $this;
    }
}
