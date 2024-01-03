<?php

class Article implements JsonSerializable{
    public int $id;
    public string $title;
    public string $description;
    public float $price;
    public int $stock;
    public string $category;

    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }
    

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function setStock(int $stock): void {
        $this->stock = $stock;
    }

    public function setCategory(string $category): void {
        $this->category = $category;
    }
}

    
