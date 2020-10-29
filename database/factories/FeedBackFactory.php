<?php

namespace Database\Factories;

use App\Models\FeedBack;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedBackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedBack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'score' => $this->faker->numberBetween(1, 5),
            'message' => $this->faker->paragraph,
            'ad_id' => $this->faker->numberBetween(1, Ad::max('id')),
            'state' => 'published'
        ];
    }
}
