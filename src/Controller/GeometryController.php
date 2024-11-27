<?php

namespace App\Controller;
use App\Entity\Circle;
use App\Service\GeometryCalculator;
use App\Utils\NumberUtils;
use App\Entity\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class GeometryController extends AbstractController
{
    #[Route('/circle/{radius}', name: 'circle')]
    public function circle(float $radius): JsonResponse
    {
        $circle = new Circle($radius);
        return $this->json($circle->toArray());
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle')]
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);
        return $this->json($triangle->toArray());
    }
    #[Route('/total', name: 'total')]
    public function total(GeometryCalculator $geometryCalculator) : JsonResponse
    {
       //Shapes could come from database or query parameters
        $circle = new Circle(20);
        $triangle = new Triangle(5, 4,3,);

        return $this->json([
            'circle' => $circle->toArray(),
            'triangle' => $triangle->toArray(),
            'total_area' => NumberUtils::truncateToDecimals($geometryCalculator->sumAreas($circle, $triangle), 2),
            'total_diameter' => NumberUtils::truncateToDecimals($geometryCalculator->sumDiameters($circle, $triangle), 2)
        ]);
    }
}
