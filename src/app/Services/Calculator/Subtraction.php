<?php

namespace App\Services\Calculator;

class Subtraction implements OperationInterface
{
    /**
     * Calculate substract $b from $a
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    public function calculate(float $a, float $b): float
    {
        return $a - $b;
    }


    /**
     * Validate Subtraction
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
