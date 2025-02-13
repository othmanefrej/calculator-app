<?php

namespace App\Services\Calculator;

class Multiplication implements OperationInterface
{
    /**
     * Calculate Multiplication of $a and $b
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    public function calculate(float $a, float $b): float
    {
        return $a * $b;
    }

    /**
     * Validate Multiplication
     *
     * @param float $a
     * @param float $b
     * @return array
     */

    public function validate(float $a, float $b): array
    {
        return [
            "error" => false,
            "message" => ""
        ];
    }
}
