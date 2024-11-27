<?php

namespace App\Service;

class GeometryCalculator
{
    public function sumAreas($shape1, $shape2): float
    {
        return $shape1->calculateSurface() + $shape2->calculateSurface();
    }

    public function sumDiameters($shape1, $shape2): float
    {
        return $shape1->calculateDiameter() + $shape2->calculateDiameter();
    }
}