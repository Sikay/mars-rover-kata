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
                $direction = 'E';
            }

            if ($charCommand === 'L' && $direction === 'E') {
                $direction = 'N';
            } else if ($charCommand === 'L' && $direction === 'N') {
                $direction = 'W';
            }

            if ($charCommand === 'M' && $direction === 'N') {
                $y++;
            } else if ($charCommand === 'M' && $direction === 'W') {
                $x--;
            } else if ($charCommand === 'M' && $direction === 'E') {
                $x++;
            }
        }

        return $x . ':' . $y . ':' . $direction;
    }
}
