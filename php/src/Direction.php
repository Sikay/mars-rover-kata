<?php

namespace MarsRover;

class Direction
{
    public static function turnRight(string $direction): string
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

    public static function turnLeft(string $direction): string
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
