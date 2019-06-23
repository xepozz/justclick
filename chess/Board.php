<?php

namespace chess;

use chess\figures\BaseFigure;
use InvalidArgumentException;
use RuntimeException;

class Board
{
    /**
     * @var \chess\figures\BaseFigure[]
     */
    private $figures;

    private function __construct()
    {
    }

    public static function init(): Board
    {
        // Создаем доску
        $board = new self();
        // Выстраиваем фигуры
        $board->figures = [

        ];

        return $board;
    }

    public function isEmptyPoint(Point $point): bool
    {
        foreach ($this->figures as $figure) {
            if ($figure->getPosition()->isEqualsTo($point)) {
                return false;
            }
        }

        return true;
    }

    public function move(BaseFigure $figure, Point $point): void
    {
        if (!$figure->canMoveTo($point)) {
            throw new InvalidArgumentException('Фигура не может быть перемещена в указанную точку');
        }
        $figure->moveTo($point);
    }

    public function attack(BaseFigure $figure, Point $point): void
    {
        if ($this->isEmptyPoint($point)) {
            throw new InvalidArgumentException('В указанной точке нет фигур для атаки');
        }
        if ($figure->canMoveTo($point)) {
            throw new InvalidArgumentException('Фигура не может быть перемещена в указанную точку');
        }
        $attackedFigure = $this->getFigure($point);
        $key = array_search($attackedFigure, $this->figures, true);
        if ($key === false) {
            throw new RuntimeException('Не найдена атакуемая фигура среди фигур на доске');
        }
        unset($this->figures[$key]);
        $figure->moveTo($point);
    }

    public function getFigure(Point $point): ?BaseFigure
    {
        foreach ($this->figures as $figure) {
            if ($figure->getPosition()->isEqualsTo($point)) {
                return $figure;
            }
        }

        return null;
    }
}