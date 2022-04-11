<?php

namespace MarsRover\Test;

use MarsRover\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    /** @test */
    public function should_create_direction_with_valid_value()
    {
        $direction = new Direction('N');
        $this->assertTrue($direction->value() === 'N');
    }

    /** @test */
    public function should_not_create_direction_with_invalid_value()
    {
        $this->expectException(\InvalidArgumentException::class);
        $direction = new Direction('A');
    }
}
