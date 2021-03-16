<?php
/**
 * 顧客コントローラーテスト
 */
namespace Tests\Feature\Api;

use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * 顧客ControllerのTestクラスです。
 *
 * @author Satoshi Nagashiba <s.nagashiba@sonicmoov.com>
 * @package Tests\Feature\Api
 */
class CustomerControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        Customer::factory(10)->create();
    }

    /**
     * 初期表示テストです。
     */
    public function testIndex(): void
    {
        $response = $this->get('api/v1/customer');
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * 検索テストです。
     */
    public function testSearch(): void
    {
        $params = [
            'gender' => '1'
        ];
        $response = $this->post('api/v1/customer', $params);
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * 新規作成テストです。
     */
    public function testCreate(): void
    {
        $response = $this->get('api/v1/customer/create');
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * 詳細テストです。
     */
    public function testDetail(): void
    {
        $id = 1;
        $model = Customer::findByid($id);
        $this->assertNotEmpty($model);

        $response = $this->get('api/v1/customer/detail/' . $id);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * 編集テストです。
     */
    public function testEdit(): void
    {
        $id = 1;
        $model = Customer::findByid($id);
        $this->assertNotEmpty($model);

        $response = $this->get('api/v1/customer/edit/' . $id);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * 登録テストです。
     */
    public function testStore(): void
    {
        $id = Customer::orderByDesc('id')->first()->id;
        $params = [
            'last_name' => 'ひでぶ',
            'first_name' => 'あべし',
            'last_kana' => 'ほげ',
            'first_kana' => 'ふが',
            'gender' => 2,
            'post_code' => '123-4567',
            'address' => '東京都渋谷区道玄坂2丁目11-1',
            'building' => 'Ｇスクエア渋谷道玄坂 4F',
            'email' => 'you@example.com',
        ];
        $response = $this->post('api/v1/customer/store', $params);
        $response->assertStatus(Response::HTTP_OK);

        $model = Customer::findByid($id + 1);
        $this->assertNotEmpty($model);
    }

    /**
     * 更新テストです。
     */
    public function testUpdate(): void
    {
        $params = [
            'id' => 1,
            'last_name' => 'ひでぶ',
            'first_name' => 'あべし',
            'last_kana' => 'ほげ',
            'first_kana' => 'ふが',
            'gender' => 2,
            'post_code' => '123-4567',
            'address' => '東京都渋谷区道玄坂2丁目11-1',
            'building' => 'Ｇスクエア渋谷道玄坂 4F',
            'email' => 'you@example.com',
        ];
        $response = $this->put('api/v1/customer/update', $params);
        $response->assertStatus(Response::HTTP_OK);

        $model = Customer::findByid($params['id']);
        $this->assertNotEmpty($model);
        $this->assertEquals('ひでぶ', $model->last_name);
    }

    /**
     * 削除テストです。
     */
    public function testDelete() {
        $id = 1;
        $model = Customer::findByid($id);
        $this->assertNotEmpty($model);

        $params = [
            'id' => $id,
        ];
        $response = $this->delete('api/v1/customer/delete', $params);

        $response->assertStatus(Response::HTTP_OK);
    }
}
