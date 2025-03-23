<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Only show approved blog posts in global "latestPosts"
        View::composer('*', function ($view) {
            $latestPosts = Post::where('status', 'approved')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            $view->with('latestPosts', $latestPosts);
        });

        Schema::defaultStringLength(191);
    }
}
