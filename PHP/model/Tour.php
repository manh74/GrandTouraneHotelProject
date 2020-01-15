<?php
class Tour{
	public $id;
	public $name;
	public $image;
	public $start;
	public $time;
	public $price;
	
	public function __construct($id,  $name,$image, $start, $time, $price) {
		$this->id = $id;
    	$this->name = $name;
    	$this->image = $image;
    	$this->start = $start;
    	$this->time = $time;
    	$this->price = $price;
  	}
}
?>