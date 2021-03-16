<?php
/**
 * データベースシーダー
 */
namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * データベースSeederクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerSeeder::class);
    }
}
