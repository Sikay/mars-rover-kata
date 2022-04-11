<?php

namespace MarsRover\Test;

use MarsRover\Direction;
use PHPUnit\Framework\TestCase;
use Iterator;

class DirectionTest extends TestCase
{
    public function validDirectionsProvider(): iterator
    {
        yield "North"   => ['N'];
        yield "East"    => ['E'];
        yield "South"   => ['S'];
        yield "West"    => ['W'];
    }

    /**
     * @test
     * @dataProvider validDirectionsProvider
     */
    public function should_create_direction_with_valid_value($validDirection)
    {
        $direction = new Direction($validDirection);
        $this->assertTrue($direction->value() === $validDirection);
    }

    public function invalidDirectionsProvider(): iterator
    {
        yield "Invalid direction A" => ['A'];
        yield "Invalid direction C" => ['C'];
        yield "Invalid direction H" => ['H'];
        yield "Invalid direction P" => ['P'];
    }

    /**
     * @test
     * @dataProvider invalidDirectionsProvider
     */
    public function should_not_create_direction_with_invalid_value($invalidDirection)
    {
        $this->expectException(\InvalidArgumentException::class);
        $direction = new Direction($invalidDirection);
    }
}
