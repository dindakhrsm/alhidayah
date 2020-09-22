<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.sidebar', function($view)
        {
            $popularPosts = Post::with('author')->where("published_at", "<=", Carbon::now())->orderBy('view_count', 'desc')->take(3)->get();
            return $view->with('popularPosts', $popularPosts);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
