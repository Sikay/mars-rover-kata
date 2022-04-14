<?php

namespace MarsRover;

class Grid
{
    private const MAX_WIDTH = 10;
    private const MAX_HEIGHT = 10;
    private array $obstacles;

    public function __construct(array $obstacles)
    {
        $this->obstacles = $obstacles;
    }

    public function maxWidth(): int
    {
        return self::MAX_WIDTH;
    }

    public function maxHeight(): int
    {
        return self::MAX_HEIGHT;
    }

    public function obstacles(): array
    {
        return $this->obstacles;
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

    public function nextCoordinate(Coordinate $coordinate, Direction $direction): Coordinate
    {
        $x = $coordinate->x();
        $y = $coordinate->y();

        if ($direction->value() === 'N') {
            $y = $this->exceedHeightLimit($y + 1) ? 0 : $y + 1;
        }

        if ($direction->value() === 'S') {
            $y = $this->exceedHeightLimit($y - 1) ? self::MAX_HEIGHT - 1 : $y - 1;
        }

        if ($direction->value() === 'W') {
            $x = $this->exceedWidthLimit($x - 1) ? self::MAX_WIDTH - 1 : $x - 1;
        }

        if ($direction->value() === 'E') {
            $x = $this->exceedWidthLimit($x + 1) ? 0 : $x + 1;
        }

        $nextCoordinate = new Coordinate($x, $y);

        if ($this->isAnyObstacle($nextCoordinate)) {
            return $coordinate;
        }

        return $nextCoordinate;
    }

    public function isAnyObstacle(Coordinate $coordinate): bool
    {
        foreach ($this->obstacles() as $obstacle) {
            if ($coordinate->equals($obstacle)) {
                return true;
            }
        }
        return false;
    }
}
