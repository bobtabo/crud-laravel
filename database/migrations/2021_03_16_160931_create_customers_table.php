<?php
/**
 * 顧客マイグレーション
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 顧客Migrationクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 */
class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('ID');
            $table->string('last_name', 255)->comment('姓');
            $table->string('first_name', 255)->comment('名');
            $table->string('last_kana', 255)->comment('姓かな');
            $table->string('first_kana', 255)->comment('名かな');
            $table->integer('gender')->unsigned()->comment('性別');
            $table->string('post_code', 255)->comment('郵便番号');
            $table->string('address', 255)->comment('住所');
            $table->string('building', 255)->nullable()->comment('建物名');
            $table->string('email', 255)->comment('メールアドレス');
            $table->timestamp('created_at')->useCurrent()->comment('作成日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->comment('更新日時');
            $table->unique(['email'], 'customers_email_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
