<?php

class Room{
	public $id;
	public $image;
	public $name;
	public $price;
	public $max;
	public $rate;


	public function __construct($id, $image, $name, $price, $max, $rate) {
		$this->id = $id;
    	$this->name = $name;
    	$this->price = $price;
    	$this->max = $max;
    	$this->image = $image;
    	$this->rate = $rate;
  	}

	function rate(){

	}
	
}

?>