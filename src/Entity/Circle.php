<?php

namespace App\Entity;
use App\Utils\NumberUtils;

class Circle
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function calculateDiameter(): float
    {
        return 2 * $this->radius;
    }


    public function toArray(): array
    {
        return [
            'type' => 'circle',
            'radius' => $this->radius,
            'surface' => NumberUtils::truncateToDecimals($this->calculateSurface(),2),
            'circumference' => NumberUtils::truncateToDecimals($this->calculateDiameter() * pi(), 2)
        ];
    }
}
