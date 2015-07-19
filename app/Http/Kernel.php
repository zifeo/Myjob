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
        'auth' => \Myjob\Http\Middleware\Authenticate::class,
        'guest' => \Myjob\Http\Middleware\RedirectIfAuthenticated::class,
        'publisher' => \Myjob\Http\Middleware\PublisherMiddleware::class,
        'tequila' => \Myjob\Http\Middleware\TequilaMiddleware::class,
        'admin' => \Myjob\Http\Middleware\AdminMiddleware::class,
    ];
}
