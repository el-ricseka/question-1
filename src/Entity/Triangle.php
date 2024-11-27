<?php

namespace App\Entity;
use App\Utils\NumberUtils;

class Triangle
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calculateSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function calculateDiameter(): float
    {
        return $this->a + $this->b + $this->c;
    }



    public function toArray(): array
    {
        return [
            'type' => 'triangle',
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            'surface' => NumberUtils::truncateToDecimals($this->calculateSurface(),2),
            'circumference' => NumberUtils::truncateToDecimals($this->calculateDiameter(),2),
        ];
    }
}
