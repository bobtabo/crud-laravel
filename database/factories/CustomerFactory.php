<?php
/**
 * モデルファクトリ
 */
namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = explode(' ', $this->faker->address);
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'last_kana' => $this->faker->lastKanaName,
            'first_kana' => $this->faker->firstKanaName,
            'gender' => rand(1, 2),
            'post_code' => $address[0],
            'address' => $address[2],
            'building' => (empty($address[3]) ? null : $address[3]),
            'email' => $this->faker->email,
        ];
    }
}
