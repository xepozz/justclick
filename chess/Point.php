<?php

namespace chess;

class Point
{
    public $x;
    public $y;

    public function isEqualsTo(Point $point): bool
    {
        return $this->x === $point->x && $this->y === $point->y;
    }
}