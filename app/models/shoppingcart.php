<?php

class ShoppingCart implements JsonSerializable{
    
    public int $id;
    public int $userid;
    public int $articleid;
    public int $quantity;
    public float $price;
    public float $totalprice;
    public string $date; //in de database is het DateTime alleen pakt die hem niet
    
    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUserid(): int {
        return $this->userid;
    }

    public function getArticleid(): int {
        return $this->articleid;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getTotalprice(): float {
        return $this->totalprice;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setUserid(int $userid): void {
        $this->userid = $userid;
    }

    public function setArticleid(int $articleid): void {
        $this->articleid = $articleid;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function setTotalprice(float $totalprice): void {
        $this->totalprice = $totalprice;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }


 
}
