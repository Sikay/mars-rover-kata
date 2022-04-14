<?php

namespace MarsRover\Test;

use MarsRover\MarsRover;
use MarsRover\Grid;
use MarsRover\Coordinate;
use PHPUnit\Framework\TestCase;
use Iterator;

class MarsRoverTest extends TestCase
{
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
        yield "should_wrap_if_reaches_end_from_top"                     => ['MMMMMMMMMM', '0:0:N'];
        yield "should_wrap_if_reaches_end_from_east"                    => ['RMMMMMMMMMM', '0:0:E'];
        yield "should_wrap_if_reaches_end_from_south"                   => ['RRM', '0:9:S'];
        yield "should_wrap_if_reaches_end_from_west"                    => ['LM', '9:0:W'];
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

    /** @test */
    public function should_start_at_coodinate_zero(): void
    {
        $expectedCoodinate = new Coordinate(0, 0);
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($expectedCoodinate->equals($marsRover->position()));
    }

    /** @test */
    public function should_start_heading_north(): void
    {
        $grid = new Grid();
        $marsRover = new MarsRover($grid);
        $this->assertTrue($marsRover->direction()->value() === 'N');
    }
}
