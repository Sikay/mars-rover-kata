<?php

namespace MarsRover;

class MarsRover
{
    private Coordinate $coordinate;
    private Direction $direction;
    private Grid $grid;

    private const NORTH = 'N';

    public function __construct(Grid $grid)
    {
        $this->coordinate = new Coordinate(0, 0);
        $this->direction = new Direction(self::NORTH);
        $this->grid = $grid;
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
            if ($this->grid->exceedHeightLimit($y + 1)) {
                $y = 0;
            } else {
                $y++;
            }
        } else if ($direction === 'S') {
            if ($this->grid->exceedHeightLimit($y - 1)) {
                $y = $this->grid->maxHeight() - 1;
            } else {
                $y--;
            }
        } else if ($direction === 'W') {
            if ($this->grid->exceedWidthLimit($x - 1)) {
                $x = $this->grid->maxWidth() - 1;
            } else {
                $x--;
            }
        } else if ($direction === 'E') {
            if ($this->grid->exceedWidthLimit($x + 1)) {
                $x = 0;
            } else {
                $x++;
            }
        }

        $this->coordinate = new Coordinate($x, $y);
    }

}
