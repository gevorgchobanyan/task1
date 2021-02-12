<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'apartment' => $this->faker->name,
            'postcode' => $this->faker->numberBetween(1,100),
            'created_at' => date('H:i:s', rand(1,54000)),
            'updated_at' => date('H:i:s', rand(1,54000))
        ];
    }
}
