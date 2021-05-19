<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\admin\City::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
