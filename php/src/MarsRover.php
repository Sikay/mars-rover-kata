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
                $direction = $this->turnRight($direction);
            }

            if ($charCommand === 'L') {
                $direction = $this->turnLeft($direction);
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

    public function turnRight(string $direction): string
    {
        $rightDirection = '';
        if ($direction === 'N') {
            $rightDirection = 'E';
        } else if ($direction === 'E') {
            $rightDirection = 'S';
        } else if ($direction === 'S') {
            $rightDirection = 'W';
        } else if ($direction === 'W') {
            $rightDirection = 'N';
        }

        return $rightDirection;
    }

    public function turnLeft(string $direction): string
    {
        $leftDirection = '';
        if ($direction === 'E') {
            $leftDirection = 'N';
        } else if ($direction === 'N') {
            $leftDirection = 'W';
        } else if ($direction === 'W') {
            $leftDirection = 'S';
        } else if ($direction === 'S') {
            $leftDirection = 'E';
        }

        return $leftDirection;
    }
}
