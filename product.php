<?php 

Class product {

    public $object;

    public $marca;

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
// $test = new Product('oggetto', 'peso', 'prezzo');

// var_dump($test);



?>