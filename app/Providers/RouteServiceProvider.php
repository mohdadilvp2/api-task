<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Constants\ErrorCodes;
use Illuminate\Http\JsonResponse;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('get_country_data', function (Request $request) {
            return Limit::perMinute(20)->by($request->user()?->id ?: $request->ip())->response(function (Request $request, array $headers) {
                throw new HttpResponseException(response()->json([
                    'success'   => false,
                    'message'   => trans('error_messages.'.ErrorCodes::YT_API_ERROR),
                    'error_code' => ErrorCodes::TOO_MANY_REQUESTS
                ], JsonResponse::HTTP_TOO_MANY_REQUESTS, $headers));
            });
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
