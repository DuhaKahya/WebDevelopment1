<?php

class User implements JsonSerializable{
    public int $id;
    public string $username;
    public string $password;
    public string $email;
    public string $name;
    public string $adres;
    public string $phonenumber;
    public string $registrationdate; //in de database is het DateTime alleen pakt die hem niet


    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }


    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAdres(): string {
        return $this->adres;
    }

    public function getPhoneNumber(): string {
        return $this->phonenumber;
    }

    public function getRegistrationDate(): string {
        return $this->registrationdate;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setAdres(string $adres): void {
        $this->adres = $adres;
    }

    public function setPhoneNumber(string $phonenumber): void {
        $this->phonenumber = $phonenumber;
    }

    public function setRegistrationDate(string $registrationdate): void {
        $this->registrationdate = $registrationdate;
    }
}
    

