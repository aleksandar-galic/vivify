<?php

require_once 'Table.php';
require_once 'Pizza.php';
require_once 'Pasta.php';
require_once 'Drink.php';
require_once 'Topping.php';
require_once 'Order.php';
require_once 'Soda.php';
require_once 'FoodFactory.php';
require_once 'Water.php';
require_once 'Juice.php';

// $pizza = FoodFactory::create('pizza');

// die(var_dump($pizza));

// $table1 = new Table();
// $table2 = new Table(2);
// $table3 = new Table();
// $table4 = new Table();

// $pizza1 = new Pizza('capricciosa', );
// $pizza2 = new Pizza('peperoni');
// $pizza3 = new Pizza('quatro');
// $pizza4 = new Pizza('siciliana');

// $pasta1 = new Pasta('bolognese');
// $pasta2 = new Pasta('stagione');
// $pasta3 = new Pasta('milano');
// $pasta4 = new Pasta('italiana');
// $pasta5 = new Pasta('carbonara');

// $drink1 = new Drink('coca-cola');
// $drink2 = new Drink('pepsi');
// $drink3 = new Drink('fanta');

// $topping1 = new Topping('ketchup');
// $topping2 = new Topping('mayonese');
// $topping3 = new Topping('extra cheese');
// $topping4 = new Topping('chili');
// $topping5 = new Topping('origano');

$meal = [
	new Pizza('capricciosa'),
	new Topping('kecap'),
	new Topping('origano'),

	new Pasta('carbonara'),
	// $topping3,

	new Soda('coca-cola', 0.5),
	// $drink1,
];

$anotherMeal = [
	new Water('jana', 0.3),
	new Juice('bravo', 0.2),
];

$table4 = new Table(4);
// $table4->make(new Order($meal));
$table4->order($meal);
try {
	$table4->order($anotherMeal);
} 
catch (Exception $e) {
  	echo 'Order Message: ' .$e->getMessage();
}

$table4->pay();

try {
	$table4->order($anotherMeal);
} catch (Exception $e) {
  echo 'Order Message: ' .$e->getMessage();
}

// $table4->pay();


// $order1 = new Order($table1, $food1);
// $order2 = new Order($meal);  //if table already taken, cannot instanciate new Order (Singltone)
// $order3 = new Order($table3, $food3);
// $order1->order();
// $order3 = new Order($table2, [new Water('jana', 0.3)]);
// $order2->make();
// $order3->make();

// $order1->pay();
// $order3->pay();

// $order4 = new Order(new Table(2), $meal);
// $order4->make(); //exception

// $order2->pay();

// $order5 = new Order($table2, $food);
