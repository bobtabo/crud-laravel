<?php
/**
 * 顧客ファクトリ
 */
namespace Database\Factories;

use App\Enums\Gender;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 顧客Factoryクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package Database\Factories
 */
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
        $postCode = substr($address[0], 0, 3) . '-' . substr($address[0], 3, 4);
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'last_kana' => $this->faker->lastKanaName,
            'first_kana' => $this->faker->firstKanaName,
            'gender' => rand(Gender::MEN, Gender::WOMEN),
            'post_code' => $postCode,
            'address' => $address[2],
            'building' => (empty($address[3]) ? null : $address[3]),
            'email' => $this->faker->email,
        ];
    }
}
