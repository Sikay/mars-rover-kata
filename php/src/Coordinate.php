<?php

namespace MarsRover;

class Coordinate
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function equals(Coordinate $coordinate): bool
    {
        if ($this->x === $coordinate->x && $this->y === $coordinate->y) {
            return true;
        }
        return false;
    }
}
