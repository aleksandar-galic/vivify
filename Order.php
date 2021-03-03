<?php

require_once 'Table.php';
require_once 'Receipt.php';

class Order {

	public Table $table;
	public array $meal;

	public function __construct(array $meal)
	{
		$this->meal = $meal;
	}

	public function make($meal)
	{

	}
}