<?php
/**
 * レスポンスサービスプロバイダー
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

/**
 * レスポンスServiceProviderクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Providers
 */
class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registResponceMacro();
    }

    /**
     * レスポンスマクロを登録します。
     */
    protected function registResponceMacro(): void
    {
        // Success (200 OK.)
        Response::macro('success', function ($data = null, $status = ResponseStatus::HTTP_OK, array $headers = []) {
            if (empty($data)) {
                $data = "{}";
            }
            return Response::make($data, $status, $headers);
        });

        // Error (4xx, 5xx)
        Response::macro('failure', function (
            string $message,
            $status = ResponseStatus::HTTP_INTERNAL_SERVER_ERROR
        ) {
            $data = [
                'message' => $message,
            ];
            return Response::make($data, $status);
        });
    }
}
