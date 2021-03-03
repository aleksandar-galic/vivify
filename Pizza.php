<?php

require_once 'Food.php';

class Pizza extends Food {

	public function __construct($name)
	{
		parent::__construct($name, rand(300, 600));
	}
}