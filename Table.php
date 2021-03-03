<?php

class Table {

	const UNPAID_LIMIT = 2;

	private string $number;
	private int $unpaidOrders = 0;
	public array $items = [];

	public function __construct(string $number)
	{
		$this->number = $number;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function order(array $items)
	{
		$this->unpaidOrders++;

		if ($this->unpaidOrders > self::UNPAID_LIMIT) {
			$this->unpaidOrders--;

			throw new Exception("You cannot make a new order until you pay the last one. \n", 1);
		}

		$this->items = array_merge($this->items, $items);

		echo "Your order has been made.\n";
	}

	public function pay()
	{
		$this->unpaidOrders--;

		$receipt = new Receipt($this);

		echo $receipt->print();
	}

	public function make(Order $order)
	{
		$order->process();
	}

}