<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // based on migration file
            'company_id' => $this->faker->randomDigitNotNull(),
            'invoice_number' => $this->faker->unique()->numerify('INV-#####'),
            'issue_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'description' => $this->faker->sentence(),
            'total_amount' => $this->faker->randomFloat(2, 100, 10000),
            'status' => $this->faker->randomElement(['draft', 'sent', 'paid']),
            'pdf_path' => $this->faker->optional()->filePath(),
        ];
    }
}
