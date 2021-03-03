<?php

require_once 'Food.php';

class Topping extends Food {
	
	public function __construct($name)
	{
		parent::__construct($name, rand(20, 100));
	}
}