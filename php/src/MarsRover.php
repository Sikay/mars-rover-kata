<?php

namespace MarsRover;

class MarsRover
{
    public function __construct(Grid $grid)
    {

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

            if ($charCommand === 'M' && $direction === 'N') {
                $y++;
            } else if ($charCommand === 'M' && $direction === 'S') {
                $y--;
            } else if ($charCommand === 'M' && $direction === 'W') {
                $x--;
            } else if ($charCommand === 'M' && $direction === 'E') {
                $x++;
            }
        }

        return $x . ':' . $y . ':' . $direction;
    }


}
