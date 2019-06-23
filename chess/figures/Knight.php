<?php

namespace chess\figures;

use chess\Point;

/**
 * Конь
 */
class Knight extends BaseFigure
{
    /**
     * Ход конем: 2 единицы длины по одной оси и одна по другой
     *
     * @param \chess\Point $point
     *
     * @return bool
     */
    public function canMoveTo(Point $point): bool
    {
        $dX = $this->currentPosition->x - $point->x;
        $dY = $this->currentPosition->y - $point->y;

        return ($dX === 2 && $dY === 1) || ($dX === 1 && $dY === 2);
    }
}