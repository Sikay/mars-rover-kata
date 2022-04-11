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
        return self::turnDirection($rightDirections, $direction);
    }

    public static function turnLeft(string $direction): string
    {
        $leftDirections = [
            'N' => 'W',
            'E' => 'N',
            'S' => 'E',
            'W' => 'S',
        ];
        return self::turnDirection($leftDirections, $direction);
    }

    private static function turnDirection(array $validDirections, string $direction): string
    {
        foreach ($validDirections as $currentDirection => $validDirection) {
            if ($currentDirection === $direction) {
                return $validDirection;
            }
        }
    }
}
