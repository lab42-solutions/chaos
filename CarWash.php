<?php

class CarWash {
    private $wash_type;
    private $desc;
    private $car;

    public function __construct($wash_type='default wash type') {
        $this->desc = new CarDetails();
        $this->wash_type = $wash_type;
        
        $this->design_car();
    }

    public function __wakeup() {
	    $this->design_car();
    }

    private function design_car() {
        $this->car = new Car($this->wash_type, $this->desc);
    }

    public function set_desc($new_desc) {
    	$this->desc = $new_desc;
    }
}

class CarDetails {
    public $car_desc;
    public $wash_desc;

    public function __construct() {
        $this->car_desc = 'default car desc';
        $this->wash_desc = 'default car wash';
    }
}

class Car {
    public $desc;
    public $car_type;
    
    public function __construct($wash_type, $desc) {
        $this->desc = $desc->$wash_type;
    }
    
    public function set_car_type($cartype) {
	$this->car_type = $cartype;
    }
    
    public function set_desc($desc) {
    	$this->desc = $desc;
    }
}

class PageLoad {
    private $callback;

    public function __construct($callback) {
        $this->callback = $callback;
    }

    public function __get($name) {
    	if ($this->callback === 'readFile') {
		echo file_get_contents('/opportunity/' . basename($name));
        }
    }   
}
?>
