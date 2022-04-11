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

        if ($command === 'M') {
            $y++;
        }

        return $x . ':' . $y . ':' . $direction;
    }
}
