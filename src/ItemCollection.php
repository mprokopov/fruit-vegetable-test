<?php

namespace Camper;
use Camper\Item;
use Camper\Measurement;

class ItemCollection
{
    private array $items = array();
    private string $title;
    private Measurement $sum;

    public function __construct(string $title = 'Unnamed collection')
    {
        $this->sum = new Measurement(0, 'kg');
        $this->title = $title;
    }

    public function add(Item $item)
    {
        $items[] = $item;
        $this->sum->add($item->getMeasurement());
    }
    public function getSum()
    {
        return $this->sum;
    }

    public function __toString()
    {
        return $this->title . " -> " . $this->sum;
    }
}
