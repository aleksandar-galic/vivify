<?php

class FoodFactory {
	
	public function create(string $foodType)
	{
		$class = ucwords($foodType);

		return new $class;
	}
}