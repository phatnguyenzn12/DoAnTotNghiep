<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\CommentLessonNotification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['layouts.client.header'], function ($view) {
            if (auth()->user()) {
                $carts = auth()->user()->load('carts')->carts;
                $view->with('carts', $carts);
            } else {
                $view->with('carts', []);
            }
        });

        View::composer(['components.client.home.onwer-course'], function ($view) {
            if (auth()->user()) {
                $ownerCourse = auth()->user()->load('courses')
                    ->courses()
                    ->select('*')
                    ->where('status', 2)
                    ->get();
                $view->with('ownerCourse', $ownerCourse);
            } else {
                $view->with('ownerCourse', []);
            }
        });

        View::composer(['layouts.client.header'], function ($view) {
            if (auth()->guard('mentor')->check()) {

                $notifications = auth()->guard('mentor')
                    ->user()
                    ->notifications;
                $view->with('notifications', $notifications);

            } elseif (auth()->guard('web')->user()) {

                $notifications = auth()->user()
                    ->notifications;
                $view->with('notifications', $notifications);

            } else {
                $view->with('notifications', []);
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
