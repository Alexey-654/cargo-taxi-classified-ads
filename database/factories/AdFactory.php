<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->bothify('+79#########'),
            'type' => $this->faker->randomElement(['Premium', 'Standart']),
            'cargo_capacity' => $this->faker->numberBetween(1, 20),
            'body_length' => $this->faker->randomFloat(1, 3, 14),
            'body_width' => $this->faker->randomFloat(1, 1, 3),
            'body_height' => $this->faker->randomFloat(1, 1, 3),
            'back_door' => $this->faker->numberBetween(0, 1),
            'side_door' => $this->faker->numberBetween(0, 1),
            'up_door' => $this->faker->numberBetween(0, 1),
            'open_door' => $this->faker->numberBetween(0, 1),
            'movers' => $this->faker->numberBetween(0, 1),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'city_price' => $this->faker->numberBetween(450, 1000),
            'out_of_town_price' => $this->faker->numberBetween(25, 100),
            'photo' => 'adsPhoto/id1.jpeg',
            'state' => 'published',
            'updated_at' => $this->faker->dateTimeThisMonth,
            'created_at' => $this->faker->dateTimeThisYear
        ];
    }
}
