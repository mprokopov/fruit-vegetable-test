<?php declare(strict_types=1);

namespace Camper;

class Measurement
{
    const UNITS = ['kg', 'g'];
    private float $quantity;
    private string $unit;

    public function __construct(float $quantity, string $unit)
    {
        $this->quantity = $quantity;

        if (! in_array($unit, self::UNITS)) {
            throw new \InvalidArgumentException('unit is not supported');
        }

        $this->unit = $unit;

        if ($this->unit == 'g') {
            $this->unit = 'kg';
            $this->quantity = $quantity / 1000;
        }
    }

    public function add(Measurement $needle)
    {
        if(! $needle->getUnit() == $this->getUnit()) {
            throw new \InvalidArgumentException('units are not the same');
        }

        $this->quantity += $needle->getQuantity();
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function __toString()
    {
        return $this->quantity . $this->unit;
    }
}
