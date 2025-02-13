<?php

namespace App\Services\Traits;

use App\Services\Calculator\Addition;
use App\Services\Calculator\Division;
use App\Services\Calculator\Multiplication;
use App\Services\Calculator\OperationInterface;
use App\Services\Calculator\Subtraction;

trait OperationTrait
{

    /**
     * Get class instance using operation
     * 
     * @param string $operation
     * @return OperationInterface
     */
    public function resolveOperation(string $operation): OperationInterface
    {
        switch ($operation) {
            case 'add':
                return new Addition();
            case 'subtract':
                return new Subtraction();
            case 'multiply':
                return new Multiplication();
            case 'divide':
                return new Division();
                // we can add more cases of operation
            default:
                throw new \InvalidArgumentException('Invalid operation');
        }
    }
}
