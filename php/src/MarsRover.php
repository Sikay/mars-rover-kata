<?php

namespace MarsRover;

class MarsRover
{
    private $coordinate;
    private $direction;

    private const NORTH = 'N';

    public function __construct(Grid $grid)
    {
        $this->coordinate = new Coordinate(0, 0);
        $this->direction = new Direction(self::NORTH);
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
        $direction = $this->direction->value();
        $charCommands = str_split($command);
        foreach ($charCommands as $charCommand) {
            if ($charCommand === 'R') {
                $direction = $this->direction->turnRight($direction);
            }

            if ($charCommand === 'L') {
                $direction = $this->direction->turnLeft($direction);
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

        if ($direction === self::NORTH) {
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
