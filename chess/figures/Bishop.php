<?php

namespace chess\figures;

use chess\Point;

/**
 * Слон
 */
class Bishop extends BaseFigure
{
    /**
     * Может ходить "квадратом", т.е. N клеток по X и N клеток по Y
     *
     * @param \chess\Point $point
     *
     * @return bool
     */
    public function canMoveTo(Point $point): bool
    {
        return abs($this->currentPosition->x - $point->x) === abs($this->currentPosition->y - $point->y);
    }
}