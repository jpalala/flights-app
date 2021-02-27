<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'           => $this->faker->name,
            'code'           => $this->faker->word,
            'origin'         => $this->faker->city,
            'destination'    => $this->faker->city,
            'departure_time' => $this->faker->dateTime(),
            'arrival_time'   => $this->faker->dateTime()
        ];
    }
}
