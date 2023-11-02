<?php
// src/Entity/Product.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $precio;

    // Getters and setters for the properties

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->nombre;
    }

    public function setName(string $name): self
    {
        $this->nombre = $name;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->precio;
    }

    public function setPrice(float $price): self
    {
        $this->precio = $price;
        return $this;
    }
}
