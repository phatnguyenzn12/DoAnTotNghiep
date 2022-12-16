<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    protected $namespace = 'App\Http\Controllers';
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/auth.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/user.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/banner.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/order.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/teacher.php'));


            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/auth.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/home.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/account.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/home.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/lesson.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/chapter.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/course.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/course.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/chapter.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/lesson.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/account.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/statistical.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/certificate.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mentor/teacher.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/catecourse.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/discount.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/auth.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/mentor.php'));


            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/admin.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/skill.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/specialize.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/statistical.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/course.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/certificate.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client/course.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client/lesson.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client/order.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client/account.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/client/mentor.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
