<?php

namespace chess\figures;

use chess\Point;
use chess\Side;
use RuntimeException;

abstract class BaseFigure
{
    /**
     * @var \chess\Point
     */
    protected $currentPosition;
    /**
     * @var \chess\Side
     */
    protected $side;

    public function __construct(Point $position, Side $side)
    {
        $this->currentPosition = $position;
        $this->side = $side;
    }

    abstract public function canMoveTo(Point $point): bool;

    public function moveTo(Point $point): void
    {
        if ($this->canMoveTo($point)) {
            $this->currentPosition = $point;

            return;
        }
        throw new RuntimeException('Не могу перейти в точку: ', print_r($point, 1));
    }

    public function getPosition(): Point
    {
        return $this->currentPosition;
    }
}