<?php

namespace App\Classes;

use JsonSerializable;

class Product implements JsonSerializable
{
    private string $name;
    private string $description;
    private string $price;
    private string $slug;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }




    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "slug" => $this->slug,
        ];
    }
}
