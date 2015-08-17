<?php

namespace Myjob\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Myjob\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Myjob\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'publisher' => \Myjob\Http\Middleware\PublisherAuth::class,
        'tequila' => \Myjob\Http\Middleware\TequilaAuth::class,
        'admin' => \Myjob\Http\Middleware\AdminAuth::class,
        'locales' => \Myjob\Http\Middleware\Locales::class,
    ];
}
