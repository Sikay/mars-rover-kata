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
        $obstacleMessage = '';

        $nextCoordinate = $this->grid->nextCoordinate($this->coordinate, $this->direction);

        if ($nextCoordinate->equals($this->coordinate)) {
            $obstacleMessage = '0:';
        } else {
            $this->coordinate = $nextCoordinate;
        }

        return $obstacleMessage;
    }

}
