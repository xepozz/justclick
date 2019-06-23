<?php

namespace chess\figures;

use chess\Point;

/**
 * Ладья
 */
class Rook extends BaseFigure
{
    /**
     * Может ходить либо по X, либо по Y на любую длину
     * @param \chess\Point $point
     *
     * @return bool
     */
    public function canMoveTo(Point $point): bool
    {
        $isXEquals = $this->currentPosition->x === $point->x;
        $isYEquals = $this->currentPosition->y === $point->y;

        return ($isXEquals && !$isYEquals) || (!$isXEquals && $isYEquals);
    }
}