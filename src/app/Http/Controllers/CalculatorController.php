<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Services\Calculator\CalculatorService;
use App\Services\Calculator\OperationInterface;
use App\Services\Traits\OperationTrait;

class CalculatorController extends Controller
{
    protected $operation;
    use OperationTrait;

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
     * return the calculated value to the view
     *
     * @param CalculatorRequest $request
     * @return void
     */
    public function calculate(CalculatorRequest $request)
    {
        try {
            $validated = $request->validated();

            $operationClass = $this->resolveOperation($validated['operation']);
            $calculator = new CalculatorService($operationClass);

            $error = $calculator->validate($validated['number1'], $validated['number2']);

            if ($error["error"]) {

                return back()->with('error', $error["message"])->withInput();
            }

            $result = $calculator->execute($validated['number1'], $validated['number2']);
            return back()->with('result', $result)->withInput();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * return calculator view
     *
     * @return void
     */
    public function index()
    {
        return view('calculator');
    }
}
