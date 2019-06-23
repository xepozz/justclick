<?php

namespace chess\figures;

use chess\Point;

/**
 * Ферзь
 */
class Queen extends BaseFigure
{
    /**
     * Может ходить как слон, король или ладья
     *
     * @param \chess\Point $point
     *
     * @return bool
     */
    public function canMoveTo(Point $point): bool
    {
        // можно вынести проверки в отдельный класс, дабы не дублировать код.
        // но пока для демо это незачем
        $isKing = abs($this->currentPosition->x - $point->x) <= 1 &&
                  abs($this->currentPosition->y - $point->y) <= 1;

        $isBishop = abs($this->currentPosition->x - $point->x) === abs($this->currentPosition->y - $point->y);

        $isXEquals = $this->currentPosition->x === $point->x;
        $isYEquals = $this->currentPosition->y === $point->y;
        $isRook = ($isXEquals && !$isYEquals) || (!$isXEquals && $isYEquals);

        return $isKing || $isBishop || $isRook;
    }
}