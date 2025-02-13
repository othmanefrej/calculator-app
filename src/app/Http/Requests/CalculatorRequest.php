<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'number1.required' => 'The first operand is required.',
            'number1.numeric' => 'The first operand must be a number.',
            'number2.required' => 'The second operand is required.',
            'number2.numeric' => 'The second operand must be a number.',
            'operation.required' => 'The operation is required.',
            'operation.in' => 'The operation must be one of the following: add, subtract, multiply, divide.',
        ];
    }
}
