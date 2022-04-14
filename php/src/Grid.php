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
        if ($this->exceedWidthLimit($coordinate->x()) || $this->exceedHeightLimit($coordinate->y())) {
            return true;
        }
        return false;
    }

    public function exceedWidthLimit(int $width): bool
    {
        if ($width >= self::MAX_WIDTH || $width < 0) {
            return true;
        }
        return false;
    }

    public function exceedHeightLimit(int $height): bool
    {
        if ($height >= self::MAX_HEIGHT || $height < 0) {
            return true;
        }
        return false;
    }
}
