<?php

namespace MarsRover;

class Grid
{
    private const MAX_WIDTH = 10;

    public function maxWidth(): int
    {
        return self::MAX_WIDTH;
    }

    public function exceedLimit(Coordinate $coordinate): bool
    {
        if ($coordinate->x() >= self::MAX_WIDTH) {
            return true;
        }
        return false;
    }
}
