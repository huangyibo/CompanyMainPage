<?php

namespace CompanyMainPage\Http;

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
        \CompanyMainPage\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \CompanyMainPage\Http\Middleware\VerifyCsrfToken::class,
        \CompanyMainPage\Http\Middleware\CheckUserIsItBanned::class,
        \CompanyMainPage\Http\Middleware\RecordLastActivedTime::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'           => \CompanyMainPage\Http\Middleware\Authenticate::class,
        'auth.basic'     => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest'          => \CompanyMainPage\Http\Middleware\RedirectIfAuthenticated::class,
        'admin_auth'     => \CompanyMainPage\Http\Middleware\AdminAuth::class,
        'verified_email' => \CompanyMainPage\Http\Middleware\RequireVerifiedEmail::class,
    ];
}
