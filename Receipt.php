<?php

class Receipt {

	private Table $table;

	public function __construct(Table $table)
	{
		$this->table = $table;
	}

	public function print(): string
	{
		$message = "NAPLATI:\n" . $this->makeOrderPrint() . 
					"\n" .
				$this->makePricePrint() . 
					"\n";

		return $message;
	}

	private function makeOrderPrint(): string
	{
		$order = "Porudžbina: datum " .
			date('d/m/yy H:i') .
			" sto broj {$this->table->getNumber()}" . "\n" .
			$this->makeFoodPrint();

		return $order;
	}

	private function makePricePrint(): string
	{
		$price = "Račun: datum " .
			date('d/m/yy H:i') .
			" sto broj {$this->table->getNumber()}, naplata " . 
			$this->calculateTotalPrice() . "rsd";

		return $price;
	}

	private function makeFoodPrint(): string
	{
		$items = array_map(function($o) { 
			$return = [];

			array_push($return, $o->getName());

			if (method_exists($o, 'getVolume')) {
				array_push($return, $o->getVolume());
			}

			return $return;
		}, $this->table->items);

		$items = $this->array_flatten($items);

		$items = implode("\n", $items);

		return $items;
	}

	private function calculateTotalPrice(): int
	{
		$total = array_sum(
			array_map(function($o) { return $o->getPrice(); }, $this->table->items)
		);

		return $total;
	}

	private function array_flatten($array = null) {
		$objTmp = (object) array('aFlat' => array());

		array_walk_recursive($array, create_function('&$v, $k, &$t', '$t->aFlat[] = $v;'), $objTmp);

		return $objTmp->aFlat;
	}
		
}