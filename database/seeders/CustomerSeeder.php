<?php
/**
 * 顧客シーダー
 */
namespace Database\Seeders;

use App\Models\Customer;
use DB;
use Illuminate\Database\Seeder;

/**
 * 顧客Seederクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package Database\Seeders
 */
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'customers';
        DB::table($table)->delete();
        Customer::factory(100)->create();
    }
}
