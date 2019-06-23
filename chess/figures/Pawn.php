<?php

namespace chess\figures;

use chess\Point;
use chess\Side;

/**
 * Пешка
 */
class Pawn extends BaseFigure
{
    /**
     * Ходит вперед на 1 или 2 единицы длины или по диагонали на 1 единицу
     *
     * @param \chess\Point $point
     *
     * @return bool
     */
    public function canMoveTo(Point $point): bool
    {
        $dX = abs($this->currentPosition->x - $point->x);

        // хак, чтобы учесть правильность хода.
        // чтобы белая или черная пешка не могли сходить назад по диагонали.
        $dY = $this->side->isEqualsTo(Side::SIDE_WHITE)
            ? $point->y - $this->currentPosition->y
            : $this->currentPosition->y - $point->y;

        return (($dY === 2 || $dY === 1) && $dX === 0) || ($dX === 1 && $dY === 1);
    }
}