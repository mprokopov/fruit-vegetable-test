<?php declare(strict_types=1);

namespace Camper;

use Camper\ItemCollection;

require __DIR__ . '/../vendor/autoload.php';

$items = [
    "carrot" => [
        "type" => "vegetable",
        "quantity" => 6.0,
        "unit" => "kg"
    ],
    "onion" => [
        "type" => "vegetable",
        "quantity" => 3.0,
        "unit" => "kg"
    ],
    "potato"  => [
        "type" => "vegetable",
        "quantity" => 10.0,
        "unit" => "kg"
    ],
    "banana" => [
        "type" => "fruit",
        "quantity" => 1.0,
        "unit" => "kg"
    ],
    "kiwi" => [
        "type" => "fruit",
        "quantity" => 500,
        "unit" => "g"
    ],
    "orange" => [
        "type" => "fruit",
        "quantity" => 2000,
        "unit" => "g"
    ], ];


$fruits = new ItemCollection('Fruits');
$vegetables = new ItemCollection('Vegetables');

foreach($items as $name => $item) {
    $i = Item::fromArrayItem($name, $item);

    if ($i->isFruit()) {
        $fruits->add($i);
    }

    if ($i->isVegetable()) {
        $vegetables->add($i);
    }
}

echo $fruits . "\n";

echo $vegetables . "\n";
