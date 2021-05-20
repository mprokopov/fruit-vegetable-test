<?php declare(strict_types=1);

namespace Camper;
use Camper\Measurement;

class Item
{
    const TYPES = ['vegetable', 'fruit'];

    private $measurement;
    private $name;
    private $type;

    public function __construct(string $name, Measurement $measurement, string $type)
    {
        $this->measurement = $measurement;
        $this->name = $name;
        if (! in_array($type, self::TYPES)) {
            throw new \InvalidArgumentException("the type $type is not supported");
        }
        $this->type = $type;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getMeasurement():Measurement
    {
        return $this->measurement;
    }

    public static function fromArrayItem(string $name, array $item)
    {
        ['type' => $type, 'quantity' => $quantity, 'unit' => $unit] = $item;

        return new Item($name, new Measurement($quantity, $unit), $type);
    }

    public function isVegetable(): bool
    {
        return $this->type == 'vegetable';
    }

    public function isFruit(): bool
    {
        return $this->type == 'fruit';
    }
}
