<?php

namespace MarsRover;

class Grid
{
    private const MAX_WIDTH = 10;
    private const MAX_HEIGHT = 10;

    public function maxWidth(): int
    {
        return self::MAX_WIDTH;
    }

    public function maxHeight(): int
    {
        return self::MAX_HEIGHT;
    }

    public function exceedLimit(Coordinate $coordinate): bool
    {
        if ($coordinate->x() >= self::MAX_WIDTH || $coordinate->y() >= self::MAX_HEIGHT) {
            return true;
        }
        return false;
    }
}
