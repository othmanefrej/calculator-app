<?php

namespace App\Services\Calculator;

interface OperationInterface
{
    public function calculate(float $a, float $b): float;
    public function validate(float $a, float $b): array;
}
