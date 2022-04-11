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
        $charCommands = str_split($command);
        foreach ($charCommands as $charCommand) {
            if ($charCommand === 'R') {
                $this->direction = $this->direction->turnRight();
            }

            if ($charCommand === 'L') {
                $this->direction = $this->direction->turnLeft();
            }

            if ($charCommand === 'M') {
                $this->move($this->direction->value());
            }
        }

        return $this->coordinate->x() . ':' . $this->coordinate->y() . ':' . $this->direction->value();
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
