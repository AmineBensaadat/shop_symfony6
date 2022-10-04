<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ean;

    /**
     * @ORM\OneToMany(targetEntity=ProductImages::class, mappedBy="ProductId")
     */
    private $productImages;

    /**
     * @ORM\OneToMany(targetEntity=ProductPrices::class, mappedBy="ProductId")
     */
    private $productPrices;

    public function __construct()
    {
        $this->productImages = new ArrayCollection();
        $this->productPrices = new ArrayCollection();
    }



    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(?string $ean): self
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @return Collection<int, ProductImages>
     */
    public function getProductImages(): Collection
    {
        return $this->productImages;
    }

    public function addProductImage(ProductImages $productImage): self
    {
        if (!$this->productImages->contains($productImage)) {
            $this->productImages[] = $productImage;
            $productImage->setProductId($this);
        }

        return $this;
    }

    public function removeProductImage(ProductImages $productImage): self
    {
        if ($this->productImages->removeElement($productImage)) {
            // set the owning side to null (unless already changed)
            if ($productImage->getProductId() === $this) {
                $productImage->setProductId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductPrices>
     */
    public function getProductPrices(): Collection
    {
        return $this->productPrices;
    }

    public function addProductPrice(ProductPrices $productPrice): self
    {
        if (!$this->productPrices->contains($productPrice)) {
            $this->productPrices[] = $productPrice;
            $productPrice->setProductId($this);
        }

        return $this;
    }

    public function removeProductPrice(ProductPrices $productPrice): self
    {
        if ($this->productPrices->removeElement($productPrice)) {
            // set the owning side to null (unless already changed)
            if ($productPrice->getProductId() === $this) {
                $productPrice->setProductId(null);
            }
        }

        return $this;
    }

    public function getId() {
        return $this->id;
       }



}
