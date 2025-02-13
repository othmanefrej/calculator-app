<?php

namespace App\Services\Calculator;


class Division implements OperationInterface
{
    /**
     * Calculate the division of $a on $b
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    public function calculate(float $a, float $b): float
    {
        return $a / $b;
    }

    /**
     * Validate Division
     *
     * @param float $a
     * @param float $b
     * @return array
     */
    public function validate(float $a, float $b): array
    {
        if ($b === 0.0) {
            return [
                "error" => true,
                "message" => "Division by zero is not allowed."
            ];
        } else {
            return [
                "error" => false,
                "message" => ""
            ];
        }
    }
}
