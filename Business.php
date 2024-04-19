<?php

class Business {
    private $name;
    private $description;
    private $year_of_foundation;
    private $service_name;
    private $service_price;
    private $owner_id;

    public function __construct($name, $description, $year_of_foundation, $service_name, $service_price, $owner_id) {
        $this->name = $name;
        $this->description = $description;
        $this->year_of_foundation = $year_of_foundation;
        $this->service_name = $service_name;
        $this->service_price = $service_price;
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