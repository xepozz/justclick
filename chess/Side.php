<?php

namespace chess;

class Side
{
    public const SIDE_WHITE = 1;
    public const SIDE_BLACK = 2;

    public $side;

    public function isEqualsTo(int $side): bool
    {
        return $this->side === $side;
    }
}