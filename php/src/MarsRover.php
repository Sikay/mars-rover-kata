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
            } else if ($charCommand === 'M' && $direction === 'N') {
                $y++;
            } else {
                $x++;
            }
        }

        return $x . ':' . $y . ':' . $direction;
    }
}
