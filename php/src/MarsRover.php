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
        $obstacle = '';
        $charCommands = str_split($command);
        foreach ($charCommands as $charCommand) {
            if ($charCommand === 'R') {
                $this->direction = $this->direction->turnRight();
            }

            if ($charCommand === 'L') {
                $this->direction = $this->direction->turnLeft();
            }

            if ($charCommand === 'M') {
                $obstacle = $this->move();
            }
        }

        return $obstacle . $this->coordinate->x() . ':' . $this->coordinate->y() . ':' . $this->direction->value();
    }

    public function move(): string
    {
        $x = $this->coordinate->x();
        $y = $this->coordinate->y();
        $direction = $this->direction->value();

        if ($direction === self::NORTH) {
            $y = $this->grid->exceedHeightLimit($y + 1) ? 0 : $y + 1;
        }

        if ($direction === 'S') {
            $y = $this->grid->exceedHeightLimit($y - 1) ? $this->grid->maxHeight() - 1 : $y - 1;
        }

        if ($direction === 'W') {
            $x = $this->grid->exceedWidthLimit($x - 1) ? $this->grid->maxWidth() - 1 : $x - 1;
        }

        if ($direction === 'E') {
            $x = $this->grid->exceedWidthLimit($x + 1) ? 0 : $x + 1;
        }

        $newPosition = new Coordinate($x, $y);

        foreach ($this->grid->obstacles() as $obstacle) {
            if ($newPosition->equals($obstacle)) {
                return '0:';
            }
        }

        $this->coordinate = new Coordinate($x, $y);

        return '';
    }

}
