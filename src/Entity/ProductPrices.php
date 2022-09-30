<?php

namespace App\Entity;

use App\Repository\ProductPricesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductPricesRepository::class)
 */
class ProductPrices
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="productPrices")
     */
    private $ProductId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getProductId(): ?Products
    {
        return $this->ProductId;
    }

    public function setProductId(?Products $ProductId): self
    {
        $this->ProductId = $ProductId;

        return $this;
    }
}
