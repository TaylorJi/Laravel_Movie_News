<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Org>
 */
class OrgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
        'user_id' => 1,
        'orgName' => $this->faker->Company(),
        'orgType' => $this->faker->company(),
        'street' => $this->faker->streetAddress(),
        'city' => $this->faker->city(),
        'postalCode' => $this->faker->postcode(),
        'province' => $this->faker->state(),
        'country' => $this->faker->country(),
        'phone' => $this->faker->phoneNumber(),
        'email' => $this->faker->email(),
        ];
        }
}
