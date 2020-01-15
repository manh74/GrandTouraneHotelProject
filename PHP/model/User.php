<?php

class User{
	public $id;
	public $password;
	public $email;
	public $phone;
	public $birthday;
	public $roll;
	public $fullName;


	public function __construct($id, $fullName, $password, $email, $phone, $birthday,$roll) {
		$this->id = $id;
    	$this->fullName = $fullName;
    	$this->password = $password;
    	$this->email = $email;
    	$this->phone = $phone;
    	$this->birthday = $birthday;
    	$this->roll = $roll;
  	}

	function setRoll(){
		return $this->roll == "admin";
	}
	
}

?>