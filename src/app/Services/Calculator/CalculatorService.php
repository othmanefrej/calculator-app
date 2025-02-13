<?php

namespace App\Services\Calculator;

class CalculatorService
{
    protected $operation;


    /**
     * Initialize OperationInterface to operation
     *
     * @param OperationInterface $operation
     */
    public function __construct(OperationInterface $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Validate $a and $b
     *
     * @param float $a
     * @param float $b
     * @return array
     */
    public function validate(float $a, float $b): array
    {
        return $this->operation->validate($a, $b);
    }

    /**
     * Execute calculation proccess
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    public function execute(float $a, float $b): float
    {
        return $this->operation->calculate($a, $b);
    }
}
