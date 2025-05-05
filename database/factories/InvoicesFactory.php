<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => \App\Models\Company::factory(),
            'invoice_number' => 'INV-' . $this->faker->unique()->numberBetween(1000, 9999),
            'issue_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'total_amount' => $this->faker->randomFloat(2, 100, 5000),
            'status' => $this->faker->randomElement(['draft', 'sent', 'paid']),
            'pdf_path' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
