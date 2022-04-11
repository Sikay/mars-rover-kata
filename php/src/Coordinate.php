<?php

namespace MarsRover;

class Coordinate
{
    private $x;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x()
    {
        return $this->x;
    }

    public function y()
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
