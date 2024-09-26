<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductAction;
use App\Models\ProductCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('path.public', function () {
            return base_path() . '/public_html';
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        if (!$this->app->runningInConsole()) {
            $globalServices = Service::all();
            $settings = getOptions('setting');
            $menuPosts = Post::where('menu_display', 1)->where('status', 'published')->orderBy('created_at', 'desc')->get();
            $footerPosts = Post::where('footer_display', 1)->where('status', 'published')->orderBy('created_at', 'desc')->get()->take(3);
            View::share('storageUrl', '/storage/');
            View::share('setting', $settings);
            View::share('menuPosts', $menuPosts);
            View::share('footerPosts', $footerPosts);
            View::share('globalServices', $globalServices);
        }

        // Parse Date
        Blade::directive('dateFormat', function ($date) {
            $date = Carbon::parse($date);
            return $date->format('dd/mm/yyyy');
        });
    }
}
