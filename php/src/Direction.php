<?php

namespace MarsRover;

class Direction
{
    public static function turnRight(string $direction): string
    {
        $rightDirections = [
            'N' => 'E',
            'E' => 'S',
            'S' => 'W',
            'W' => 'N',
        ];
        foreach ($rightDirections as $currentDirection => $rightDirection) {
            if ($currentDirection === $direction) {
                return $rightDirection;
            }
        }
    }

    public static function turnLeft(string $direction): string
    {
        $leftDirections = [
            'N' => 'W',
            'E' => 'N',
            'S' => 'E',
            'W' => 'S',
        ];
        foreach ($leftDirections as $currentDirection => $leftDirection) {
            if ($currentDirection === $direction) {
                return $leftDirection;
            }
        }
    }
}
