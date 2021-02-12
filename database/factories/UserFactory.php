<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'consent' => $this->faker->boolean,
            'created_at' => date('H:i:s', rand(1,54000)),
            'updated_at' => date('H:i:s', rand(1,54000))
        ];
    }

}
