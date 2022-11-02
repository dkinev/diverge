<?php

namespace dkinev\diverge\Test\Unit;

use dkinev\diverge\Diverge;
use PHPUnit\Framework\TestCase;

class DivergeTest extends TestCase
{
    protected Diverge $diverge;

    protected function setUp(): void
    {
        // Default diff value = 25%
        $this->diverge = new Diverge();
    }

    public function testDiffPrice()
    {
        $result = $this->diverge->diffPrice(200, 20);
        $this->assertFalse($result);

        $result = $this->diverge->diffPrice(14.9, 20);
        $this->assertFalse($result);

        $result = $this->diverge->diffPrice(-10, 20);
        $this->assertFalse($result);

        $result = $this->diverge->diffPrice(0, 0);
        $this->assertFalse($result);

        $result = $this->diverge->diffPrice(12.5, 10);
        $this->assertTrue($result);

        $result = $this->diverge->diffPrice(7.8, 10);
        $this->assertTrue($result);
    }

    public function testGetDeviation()
    {
        $this->diverge->diffPrice(11, 10);
        $this->assertEquals(2.5, $this->diverge->getDeviation());

        $this->diverge->diffPrice(-3, 10);
        $this->assertNotEquals(2.1, $this->diverge->getDeviation());
    }
}
