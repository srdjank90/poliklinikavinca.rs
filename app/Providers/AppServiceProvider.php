<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductAction;
use App\Models\ProductCategory;
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
            $currency = getOption('product_currency_opt', 'EUR');
            $productMetas = getOption('product_metas_opt', []);
            $productCategories = ProductCategory::where('slug', '!=', 'uncategorized')->orderBy('favorite_flag', 'desc')->orderBy('created_at', 'asc')->get();
            $settings = getOptions('setting');
            $productAction = ProductAction::orderBy('id', 'desc')->first();
            $menuPosts = Post::where('menu_display', 1)->where('status', 'published')->orderBy('created_at', 'desc')->get();
            $footerPosts = Post::where('footer_display', 1)->where('status', 'published')->orderBy('created_at', 'desc')->get()->take(3);
            $royalMintProducts = Product::with('files')->whereHas('categories', function ($query) {
                $query->where('slug', 'royal-mint');
            })->where('status', 'published')->orderBy('created_at', 'desc')->get()->take(7);
            $bestsellerProducts = Product::whereIn('id', [3, 6, 7, 9, 11, 12, 32])->get();
            View::share('storageUrl', '/storage/');
            View::share('currency', $currency);
            View::share('productMetas', $productMetas);
            View::share('setting', $settings);
            View::share('productAction', $productAction);
            View::share('productCategories', $productCategories);
            View::share('menuPosts', $menuPosts);
            View::share('footerPosts', $footerPosts);
            View::share('royalMintProducts', $royalMintProducts);
            View::share('bestsellerProducts', $bestsellerProducts);
            // Get gold price
            $goldPrice = 99;
            $goldPrice = getOption('gold_rate_gram_eur', 99);
            View::share('goldPrice', $goldPrice);
        }

        // Blade directives
        Blade::directive('priceFormat', function ($money) {
            return "<?php echo number_format($money, 2,',','.'); ?>";
        });

        // Parse Date
        Blade::directive('dateFormat', function ($date) {
            $date = Carbon::parse($date);
            return $date->format('dd/mm/yyyy');
        });
    }
}
