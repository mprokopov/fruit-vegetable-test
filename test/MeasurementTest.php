<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Camper\Measurement;

class MeasurementTest extends TestCase
{
    public function testGramms()
    {
        $sut = new Measurement(2000, 'g');
        $this->assertEquals('kg', $sut->getUnit());
        $this->assertEquals(2, $sut->getQuantity());
    }

    public function testAddKg()
    {
        $sut = new Measurement(2000, 'g');
        $sut->add(new Measurement(1, 'kg'));

        $this->assertEquals('kg', $sut->getUnit());
        $this->assertEquals(3, $sut->getQuantity());
    }

    public function testAddGramm()
    {
        $sut = new Measurement(2000, 'g');
        $sut->add(new Measurement(500, 'g'));

        $this->assertEquals('kg', $sut->getUnit());
        $this->assertEquals(2.5, $sut->getQuantity());
    }

    public function testUnknownUnit()
    {
        $this->expectException(InvalidArgumentException::class);
        $sut = new Measurement(2000, 'gb');
    }
}
