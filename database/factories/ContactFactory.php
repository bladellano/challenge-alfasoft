<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'contact' => $this->faker->numerify('139########'),
            'email' => $this->faker->unique()->safeEmail,
            'user_id' => User::all()->random()->id,
        ];
    }
}
