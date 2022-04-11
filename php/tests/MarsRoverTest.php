<?php

namespace MarsRover\Test;

use MarsRover\MarsRover;
use MarsRover\Grid;
use PHPUnit\Framework\TestCase;
use Iterator;

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

    /** @test */
    public function should_move_forward_turn_left_continue_and_turn_left()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMMLM') === '2:3:N');
    }

    /** @test */
    public function should_move_forward_and_turn_to_west()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMMLMLM') === '1:3:W');
    }

    /** @test */
    public function should_move_forward_and_turn_left_to_west()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMMLMLM') === '1:3:W');
    }

    /** @test */
    public function should_move_forward_and_turn_left_to_south()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMMLMLMLM') === '1:2:S');
    }

    /** @test */
    public function should_move_forward_and_turn_left_to_complete_circle()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMMLMLMLMLM') === '2:2:E');
    }

    /** @test */
    public function should_move_forward_and_turn_right_to_complete_circle()
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute('MMRMMRMRMRMM') === '1:3:N');
    }

    public function validCommandsProvider(): iterator
    {
        yield "should_move_forward"                                     => ['M', '0:1:N'];
        yield "should_move_forward_two_positions"                       => ['MM', '0:2:N'];
        yield "should_move_forward_turn_right_and_continue"             => ['MMRMM', '2:2:E'];
        yield "should_move_forward_turn_left_continue_and_turn_left"    => ['MMRMMLM', '2:3:N'];
        yield "should_move_forward_and_turn_to_west"                    => ['MMRMMLMLM', '1:3:W'];
        yield "should_move_forward_and_turn_left_to_west"               => ['MMRMMLMLM', '1:3:W'];
        yield "should_move_forward_and_turn_left_to_south"              => ['MMRMMLMLMLM', '1:2:S'];
        yield "should_move_forward_and_turn_left_to_complete_circle"    => ['MMRMMLMLMLMLM', '2:2:E'];
        yield "should_move_forward_and_turn_right_to_complete_circle"   => ['MMRMMRMRMRMM', '1:3:N'];
    }

    /**
     * @test
     * @dataProvider validCommandsProvider
     */
    public function should_move_to_destination(string $command, string $destination): void
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->execute($command) === $destination);
    }
}
