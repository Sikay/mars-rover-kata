<?php

namespace MarsRover;

class MarsRover
{
    private $coordinate;
    private $direction;

    public function __construct(Grid $grid)
    {
        $this->coordinate = new Coordinate(0, 0);
        $this->direction = new Direction('N');
    }

    public function position(): Coordinate
    {
        return $this->coordinate;
    }

    public function direction(): Direction
    {
        return $this->direction;
    }

    public function execute(String $command): string
    {
        $x = 0;
        $y = 0;
        $direction = 'N';

        $charCommands = str_split($command);
        foreach ($charCommands as $charCommand) {
            if ($charCommand === 'R') {
                $direction = Direction::turnRight($direction);
            }

            if ($charCommand === 'L') {
                $direction = Direction::turnLeft($direction);
            }

            if ($charCommand === 'M') {
                $this->move($direction);
            }
        }

        return $this->coordinate->x() . ':' . $this->coordinate->y() . ':' . $direction;
    }

    public function move(string $direction): void
    {
        $x = $this->coordinate->x();
        $y = $this->coordinate->y();

        if ($direction === 'N') {
            $y++;
        } else if ($direction === 'S') {
            $y--;
        } else if ($direction === 'W') {
            $x--;
        } else if ($direction === 'E') {
            $x++;
        }

        $this->coordinate = new Coordinate($x, $y);
    }

}
