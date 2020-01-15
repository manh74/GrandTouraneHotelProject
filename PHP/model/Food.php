<?php 
 class Food{
	public $id;
	public $image;
	public $name;
	public $price;
	public $info;


	public function __construct($id, $name, $image, $price, $info) {
		$this->id = $id;
    	$this->name = $name;
    	$this->image = $image;
    	$this->price = $price;
    	$this->info = $info;
  	}
}
 ?>