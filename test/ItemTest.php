<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Camper\Measurement;
use Camper\Item;

class ItemTest extends TestCase
{
    public function testFromArrayItem() {
        $name = 'apple';
        $item = [
            "type" => "fruit",
            "quantity" => 2000,
            "unit" => "g"
        ];

        $sut = Item::fromArrayItem($name, $item);

        $this->assertEquals(new Measurement(2, 'kg'), $sut->getMeasurement());
    }

    public function testIsFruit() {

        $name = 'apple';
        $item = [
            "type" => "fruit",
            "quantity" => 2000,
            "unit" => "g"
        ];

        $sut = Item::fromArrayItem($name, $item);
        $this->assertTrue($sut->isFruit());
    }

    public function testIsVegetable() {
        $name = 'cucumber';
        $item = [
            "type" => "vegetable",
            "quantity" => 2000,
            "unit" => "g"
        ];

        $sut = Item::fromArrayItem($name, $item);
        $this->assertTrue($sut->isVegetable());
    }
}
