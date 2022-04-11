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

    /** @test */
    public function should_move_forward_two_positions()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MM') === '0:2:N');
    }

    /** @test */
    public function should_move_forward_turn_right_and_continue()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMM') === '2:2:E');
    }
}
