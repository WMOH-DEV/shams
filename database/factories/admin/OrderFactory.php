<?php

namespace Database\Factories\admin;

use App\Models\admin\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => $this->faker->numberBetween(1,30),
            'company_car' => $this->faker->word(),
            'model' => $this->faker->randomNumber(5),
            'year' => $this->faker->year(),
            'city_id'           => $this->faker->numberBetween(1,50),
            'state_piece' => $this->faker->randomElement(['من الوكالة', 'مستعملة', 'جديد', 'بديل من شركات اخرى', 'كليهما']),
            'receipt' => $this->faker->randomElement(['استلام من موقع التاجر', 'توصيل']),
            'delivery' => $this->faker->randomElement(['مستعجل', 'عادى']),
        ];
    }
}
