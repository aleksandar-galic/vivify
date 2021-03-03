<?php

require_once 'Food.php';

class Drink extends Food {
	private $volume;

	public function __construct($name, $volume)
	{
		parent::__construct($name, rand(150, 500));

		$this->volume = $volume;
	}

	public function getVolume()
	{
		return $this->volume;
	}
	
}