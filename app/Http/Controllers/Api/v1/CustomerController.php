<?php
/**
 * 顧客コントローラー
 */
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerRegistRequest;
use App\Http\Requests\Api\CustomerSearchRequest;
use App\Http\Requests\Api\CustomerUpdateRequest;
use Customer;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * 顧客Controllerクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Http\Controllers\Api\v1
 */
class CustomerController extends Controller
{
    /**
     * 検索一覧を表示します。
     *
     * @return Response レスポンス
     */
    public function index(Request $request): Response
    {
        $customers = Customer::getList();
        return response()->success($customers);
    }

    /**
     * 検索します。
     *
     * @param CustomerSearchRequest $request リクエスト
     * @return Response レスポンス
     */
    public function search(CustomerSearchRequest $request): Response
    {
        $input = $request->input();
        $customers = Customer::getList($input);

        return response()->success($customers);
    }

    /**
     * 新規登録画面を表示します。
     *
     * @return Response レスポンス
     */
    public function create(): Response
    {
        return response()->success();
    }

    /**
     * 詳細画面を表示します。
     *
     * @param Request $request リクエスト
     * @return Response レスポンス
     */
    public function detail(Request $request): Response
    {
        $customer = Customer::get($request->id);
        return response()->success($customer);
    }

    /**
     * 編集画面を表示します。
     *
     * @param Request $request リクエスト
     * @return Response レスポンス
     */
    public function edit(Request $request): Response
    {
        $customer = Customer::get($request->id);
        return response()->success($customer);
    }

    /**
     * 登録します。
     *
     * @param CustomerRegistRequest $request リクエスト
     * @return Response レスポンス
     * @throws \Throwable 顧客登録エラー時にスローされる例外です
     */
    public function store(CustomerRegistRequest $request): Response
    {
        DB::transaction(function () use ($request) {
            Customer::save($request->input());
        });

        return response()->success();
    }

    /**
     * 更新します。
     *
     * @param CustomerUpdateRequest $request リクエスト
     * @return Response レスポンス
     * @throws \Throwable 顧客更新エラー時にスローされる例外です
     */
    public function update(CustomerUpdateRequest $request): Response
    {
        DB::transaction(function () use ($request) {
            Customer::save($request->input(), $request->id);
        });

        return response()->success();
    }

    /**
     * 削除します。
     *
     * @param Request $request リクエスト
     * @return Response レスポンス
     * @throws \Throwable 顧客削除エラー時にスローされる例外です
     */
    public function delete(Request $request): Response
    {
        DB::transaction(function () use ($request) {
            Customer::delete($request->id);
        });
        return response()->success();
    }
}
