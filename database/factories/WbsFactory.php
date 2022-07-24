<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wbs>
 */
class WbsFactory extends Factory
{
    /**
     * 生成するデータをここに書く
     * ※config/app.phpのfaker_localをja_JPに変更するとダミーデータが日本語化する
     */
    public function definition()
    {
        return [
            'mainItem' => $this->faker->realText(10),
            'subItem' => $this->faker->realText(10),
            'plansStartDay' => now(),
            'plansFinishDay' => now(),
            'resultStartDay' => now(),
            'resultsFinishDay' => now(),
            'progress' => $this->faker->numberBetween(0, 100),
            'productionCost' => $this->faker->numberBetween(1, 5),
            'rep' => $this->faker->realText(10),
        ];
    }
}
