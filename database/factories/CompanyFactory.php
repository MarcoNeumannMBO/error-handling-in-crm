<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'company_name' => $this->faker->company,
        'address' => $this->faker->address,
        'city' => $this->faker->city,
        'state' => $this->faker->state,
        'zip_code' => $this->faker->postcode,
        'country' => $this->faker->country,
        'phone' => $this->faker->phoneNumber,
        'vat_number' => $this->faker->unique()->numerify('VAT-#####'),
        'email' => $this->faker->companyEmail,
        ];
    }
}
