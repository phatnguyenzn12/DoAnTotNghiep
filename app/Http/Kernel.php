<?php

namespace App\Http;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAuthLesson;
use App\Http\Middleware\CheckClient;
use App\Http\Middleware\CheckLead;
use App\Http\Middleware\CheckLessonUserMentor;
use App\Http\Middleware\CheckLesssonUser;
use App\Http\Middleware\CheckMentor;
use App\Http\Middleware\Checkout;
use App\Http\Middleware\CheckTeacher;
use App\Http\Middleware\CheckUser;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            'throttle:60,1',
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
         //---permission---
         'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        //  'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        //  'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
        'check-lesson-user' => CheckLesssonUser::class,
        'check-user' => CheckUser::class,
        'check-admin' => checkAdmin::class,
        'check-mentor' => CheckMentor::class,
        'check-admin' => CheckAdmin::class,
        'check-auth-lesson' => CheckAuthLesson::class,
        'check-out' => Checkout::class,
        'check-lead' => CheckLead::class,
        'check-teacher' => CheckTeacher::class,
        'check-client' => CheckClient::class,
    ];
}
