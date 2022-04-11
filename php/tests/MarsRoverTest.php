<?php

namespace MarsRover\Test;

use MarsRover\MarsRover;
use MarsRover\Grid;
use PHPUnit\Framework\TestCase;

class MarsRoverTest extends TestCase
{
    /** @test */
    public function should_move_forward()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('M') === '0:1:N');
    }
}
