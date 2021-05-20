<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Camper\Measurement;
use Camper\Item;
use Camper\ItemCollection;

class ItemCollectionTest extends TestCase
{
    public function testAddChangeSum() {
        $sut = new ItemCollection();

        $name = 'apple';
        $inputs = [
            "type" => "fruit",
            "quantity" => 2000,
            "unit" => "g"
        ];

        $item = Item::fromArrayItem($name, $inputs);

        $sut->add($item);

        $this->assertEquals(new Measurement(2, 'kg'), $sut->getSum());
    }
}
