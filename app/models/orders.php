<?php

class Orders implements JsonSerializable{
    
    public int $id;
    public int $shoppingcartid;
    public string $date; //in de database is het DateTime alleen pakt die hem niet
    
    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }

    public function getId(): int {
        return $this->id;
    }

    public function getShoppingcartid(): int {
        return $this->shoppingcartid;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setShoppingcartid(int $shoppingcartid): void {
        $this->shoppingcartid = $shoppingcartid;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }



 
}
