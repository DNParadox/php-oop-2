<?php 

Class product {

    public $object;

    public $weight;

    public $price;
    
    public $description;

    public function __construct($_object, $_weight , $_price) {
        $this->object = $_object;
        $this->weight = $_weight;
        $this->price = $_price;
    }

    public function getInfo() {
        return "Oggetto: $this->object  Prezzo: $this->price Euro Peso: $this->weight";
    }

}




?>