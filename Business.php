<?php

class Business {
    private $name;
    private $description;
    private $year_of_foundation;
    private $service_name;
    private $service_price;
    private $owner_id;

    public function __construct($nev, $leiras, $alapites_eve, $szolgaltatas_neve, $szolgaltatas_ara, $owner_id) {
        $this->name = $nev;
        $this->description = $leiras;
        $this->year_of_foundation = $alapites_eve;
        $this->service_name = $szolgaltatas_neve;
        $this->service_price = $szolgaltatas_ara;
        $this->owner_id = $owner_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getYearOfFoundation() {
        return $this->year_of_foundation;
    }

    public function getServiceName() {
        return $this->service_name;
    }

    public function getServicePrice() {
        return $this->service_price;
    }

    public function getOwnerId() {
        return $this->owner_id;
    }
}