<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * Teste si la page de la calculatrice s'affiche correctement.
     */
    public function testCalculatorPageLoads()
    {
        $response = $this->get('/calculator');

        $response->assertStatus(200);
        $response->assertSee('Simple Calculator'); // Vérifie que le titre est affiché
    }

    /**
     * Teste si la vue affiche correctement le résultat d'une addition.
     */
    public function testAdditionSuccess()
    {
        $response = $this->post('/calculator', [
            'number1' => 23,
            'number2' => 2,
            'operation' => 'add',
        ]);

        $response->assertSessionHas('result', 25);
    }

    /**
     * Teste une multiplication valide.
     */
    public function testMultiplicationSuccess()
    {
        $response = $this->post('/calculator', [
            'number1' => 10,
            'number2' => 5,
            'operation' => 'multiply',
        ]);

        $response->assertSessionHas('result', 50);
    }

    /**
     * Teste une division valide.
     */
    public function testDivisionSuccess()
    {
        $response = $this->post('/calculator', [
            'number1' => 10,
            'number2' => 5,
            'operation' => 'divide',
        ]);

        $response->assertSessionHas('result', 2);
    }
    /**
     * Teste une substraction valide.
     */
    public function testSubstractionSuccess()
    {
        $response = $this->post('/calculator', [
            'number1' => 10,
            'number2' => 5,
            'operation' => 'subtract',
        ]);

        $response->assertSessionHas('result', 5);
    }
    /**
     * Teste une division error.
     */
    public function testDivisionError()
    {
        $response = $this->post('/calculator', [
            'number1' => 10,
            'number2' => 0,
            'operation' => 'divide',
        ]);

        $response->assertSessionHas('error', "Division by zero is not allowed.");
    }
    /**
     * Teste une opération invalide.
     */
    public function testInvalidOperation()
    {
        $response = $this->post('/calculator', [
            'number1' => 10,
            'number2' => 5,
            'operation' => 'invalid_op',
        ]);

        $response->assertSessionHasErrors(['operation']);
    }
    /**
     * Teste l'entrée de valeurs non numériques.
     */
    public function testInvalidNumberInput()
    {
        $response = $this->post('/calculator', [
            'number1' => 'abc',
            'number2' => 'xyz',
            'operation' => 'add',
        ]);

        $response->assertSessionHasErrors(['number1', 'number2']);
    }
}
