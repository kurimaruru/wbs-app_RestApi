<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WbsComment>
 */
class WbsCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'wbsId' => $this->faker->numberBetween(1, 10),
            'user' => $this->faker->realText(10),
            'comment' => $this->faker->realText(100),
        ];
    }
}
