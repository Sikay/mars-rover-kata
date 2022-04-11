<?php

namespace MarsRover;

class Direction
{
    private $direction;

    public function __construct(string $direction)
    {
        $this->direction = $direction;
    }

    public function value(): string
    {
        return $this->direction;
    }

    public function turnRight(string $direction): string
    {
        $rightDirections = [
            'N' => 'E',
            'E' => 'S',
            'S' => 'W',
            'W' => 'N',
        ];
        return $this->turnDirection($rightDirections, $direction);
    }

    public function turnLeft(string $direction): string
    {
        $leftDirections = [
            'N' => 'W',
            'E' => 'N',
            'S' => 'E',
            'W' => 'S',
        ];
        return $this->turnDirection($leftDirections, $direction);
    }

    private function turnDirection(array $validDirections, string $direction): string
    {
        foreach ($validDirections as $currentDirection => $validDirection) {
            if ($currentDirection === $direction) {
                return $validDirection;
            }
        }
    }
}
