<?php

namespace App\Services\Calculator;

class Addition implements OperationInterface
{
    /**
     * Calculate sum of $a with $b
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    public function calculate(float $a, float $b): float
    {
        return $a + $b;
    }



    /**
     * Validate Addition
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
