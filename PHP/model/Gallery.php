<?php
class Gallery{
	public $id;
	public $title;
	public $image;
	public $timeUpdate;

	public function __construct($id, $title, $image, $timeUpdate) {
		$this->id = $id;
    	$this->title = $title;
    	$this->image = $image;
    	$this->timeUpdate = $timeUpdate;
  	}
}

?>