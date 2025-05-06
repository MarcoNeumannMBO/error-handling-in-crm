<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interaction>
 */
class InteractionFactory extends Factory
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
            'contact_id' => \App\Models\Contact::factory(),
            'interaction_date' => $this->faker->date(),
            'interaction_time' => $this->faker->time(),
            'subject' => $this->faker->optional()->sentence(),
            'notes' => $this->faker->optional()->text(),
            'interaction_type' => $this->faker->randomElement(['call', 'email', 'meeting']),
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
        ];
    }
}
