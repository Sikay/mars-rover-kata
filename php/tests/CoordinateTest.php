<?php

namespace MarsRover\Test;

use MarsRover\Coordinate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    /** @test */
    public function should_return_same_x_coordinate()
    {
        $coordinate = new Coordinate(2, 0);
        $this->assertTrue($coordinate->x() === 2);
    }
}
