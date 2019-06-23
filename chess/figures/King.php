<?php

namespace chess\figures;

use chess\Point;

/**
 * Король
 */
class King extends BaseFigure
{
    /**
     * Король может ходить вокруг себя максимум на 1 клетку в любом направлении.
     *
     * @param \chess\Point $point
     *
     * @return bool
     */
    public function canMoveTo(Point $point): bool
    {
        return abs($this->currentPosition->x - $point->x) <= 1 &&
               abs($this->currentPosition->y - $point->y) <= 1;
    }
}