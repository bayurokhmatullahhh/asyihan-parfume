<?php

namespace Tests\Feature;

use Tests\TestCase;

class NumerologyCalculatorTest extends TestCase
{
    public function test_calculator_page_is_accessible(): void
    {
        $response = $this->get('/calculator');

        $response->assertStatus(200);
        $response->assertSee('KALKULATOR NUMEROLOGI');
    }

    public function test_calculator_api_returns_correct_json_for_valid_input(): void
    {
        $response = $this->postJson('/calculator/calculate', [
            'name' => 'Bayu Rokhmatullah',
            'birth_date' => '1995-12-31',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'name' => 'Bayu Rokhmatullah',
                'birth_date' => '1995-12-31',
                'core_number' => 4,
                'archetype' => [
                    'number' => 4,
                    'name' => 'The Stabilizer',
                    'element' => 'Tanah',
                ],
            ],
        ]);
    }

    public function test_calculator_api_validates_required_fields(): void
    {
        $response = $this->postJson('/calculator/calculate', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'birth_date']);
    }

    public function test_calculator_api_rejects_future_birth_date(): void
    {
        $response = $this->postJson('/calculator/calculate', [
            'name' => 'Traveler',
            'birth_date' => '2099-01-01',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['birth_date']);
    }
}
