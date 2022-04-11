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
            if ($charCommand === 'R' && $direction === 'N') {
                $direction = 'E';
            } else if ($charCommand === 'R' && $direction === 'E') {
                $direction = 'S';
            } else if ($charCommand === 'R' && $direction === 'S') {
                $direction = 'W';
            } else if ($charCommand === 'R' && $direction === 'W') {
                $direction = 'N';
            }

            if ($charCommand === 'L' && $direction === 'E') {
                $direction = 'N';
            } else if ($charCommand === 'L' && $direction === 'N') {
                $direction = 'W';
            } else if ($charCommand === 'L' && $direction === 'W') {
                $direction = 'S';
            } else if ($charCommand === 'L' && $direction === 'S') {
                $direction = 'E';
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
