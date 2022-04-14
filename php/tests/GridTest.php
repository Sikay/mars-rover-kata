<?php

namespace MarsRover\Test;

use MarsRover\Grid;
use MarsRover\Coordinate;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    /** @test */
    public function should_exceed_the_limit_width()
    {
        $grid = new Grid();
        $coordinate = new Coordinate($grid->maxWidth() + 1, 0);
        $this->assertTrue($grid->exceedLimit($coordinate), true);
    }

    /** @test */
    public function should_exceed_the_limit_height()
    {
        $grid = new Grid();
        $coordinate = new Coordinate(0, $grid->maxHeight() + 1);
        $this->assertTrue($grid->exceedLimit($coordinate), true);
    }
}
