<?php

namespace MarsRover;

class Direction
{
    private $direction;

    public function __construct(string $direction)
    {
        $this->isValidDirection($direction);
        $this->direction = $direction;
    }

    private function isValidDirection($direction): void
    {
        $validDirection = ['N', 'E', 'S', 'W'];
        if (!in_array($direction, $validDirection, true)) {
            throw new \InvalidArgumentException('Invalid direction');
        }
    }

    public function value(): string
    {
        return $this->direction;
    }

    public function turnRight(): self
    {
        $rightDirections = [
            'N' => 'E',
            'E' => 'S',
            'S' => 'W',
            'W' => 'N',
        ];
        return $this->turnDirection($rightDirections);
    }

    public function turnLeft(): self
    {
        $leftDirections = [
            'N' => 'W',
            'E' => 'N',
            'S' => 'E',
            'W' => 'S',
        ];
        return $this->turnDirection($leftDirections);
    }

    private function turnDirection(array $validDirections): self
    {
        foreach ($validDirections as $currentDirection => $validDirection) {
            if ($currentDirection === $this->direction) {
                return new self($validDirection);
            }
        }
    }
}
