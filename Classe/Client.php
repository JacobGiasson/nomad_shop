<?php

class Client {

    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $address;
    private string $city;
    private string $zip_code;

    public function __construct(string $name, string $email, string $phone, string $address, string $city, string $zip_code) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->city = $city;
        $this->zip_code = $zip_code;
    }

    public function getFullAddress(): string {
        return $this->address . ", " . $this->city . " " . $this->zip_code;
    }

    public function getData(): array {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code
        ];
    }
    
    public function getProp(): string {
        return "Name: " . $this->name . "<br>" .
               "Email: " . $this->email . "<br>" .
               "Phone: " . $this->phone . "<br>" .
               "Address: " . $this->getFullAddress();
    }

}