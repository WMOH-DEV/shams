<?php

namespace Database\Factories\admin;

use App\Models\admin\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'           => $this->faker->numberBetween(1,30),
            'city_id'           => $this->faker->numberBetween(1,50),
            'order_id'          => $this->faker->numberBetween(1,50),
            'price'             => $this->faker->randomElement(['جزئى', 'كلى']),
            'kind_product'      =>  $this->faker->randomElement(['وكالة', 'بديل من شركات اخرى', 'كليهما']),
            'days'              =>  $this->faker->numberBetween(5,25),
            'total_price'       =>  $this->faker->randomNumber(),
        ];
    }
}
