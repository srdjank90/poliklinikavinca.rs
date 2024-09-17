<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Faq;
use App\Models\GoldPackage;
use App\Models\Page;
use App\Models\PaymentMethod;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductAction;
use App\Models\ProductCategory;
use App\Models\ProductField;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    protected $theme = 'lika';

    public function __construct()
    {
        $this->theme = getOption('theme_active_opt', 'lika');
    }

    public function index()
    {
        /* $response = Http::withoutVerifying()->get('https://radoviutoku.com/api/gold-per-gram');
        if ($response->successful()) {
            $data = $response->json();
            updateOption('gold_rate_gram_eur', $data['goldRate']);
        } */
        $favoriteCategories = ProductCategory::with('image')->where('favorite_flag', 1)->orderBy('created_at', 'asc')->get()->take(3);
        $favoriteCategories = $this->updateProductsWithAction($favoriteCategories);
        $expertAdvices = Post::with('image')->whereHas('categories', function ($query) {
            $query->where('slug', 'saveti-strucnjaka');
        })->where('highlighted', 1)->get();
        $products = Product::with(['files'])->where('status', 'published')->whereNotIn('id', [37, 38, 39])->orderBy('highlighted', 'desc')->orderBy('price', 'asc')->get();
        $productCategoriesFavorite = ProductCategory::where('favorite_flag', 1)->get();
        return view('frontend.themes.' . $this->theme . '.index', compact('favoriteCategories',  'products', 'expertAdvices', 'productCategoriesFavorite'));
    }

    public function cart()
    {
        return view('frontend.themes.' . $this->theme . '.cart');
    }

    public function checkout()
    {
        $shippings = Shipping::where('available', 1)->get();
        $paymentMethods = PaymentMethod::where('available', 1)->get();
        if (Auth::user()) {
            $user = User::where('id', Auth::user()->id)->with(['addresses'])->first();
        } else {
            $user = null;
        }

        return view('frontend.themes.' . $this->theme . '.checkout.checkout', compact('shippings', 'paymentMethods', 'user'));
    }

    public function checkoutSuccess()
    {
        return view('frontend.themes.' . $this->theme . '.checkout.success');
    }

    public function products()
    {
        //$actionProducts = Product::whereIn('id', $productsOnAction)->get();
        $products = Product::with(['files', 'categories'])->where('status', 'published')->whereNotIn('id', [37, 38, 39])->orderBy('highlighted', 'asc')->orderBy('price', 'asc')->get();
        $productMetas = getOption('product_metas_opt', []);
        $products = $this->updateProductsWithAction($products);
        $productCategoriesFavorite = ProductCategory::where('favorite_flag', 1)->get();
        $expertAdvices = Post::with('image')->whereHas('categories', function ($query) {
            $query->where('slug', 'saveti-strucnjaka');
        })->where('highlighted', 1)->get();
        return view('frontend.themes.' . $this->theme . '.products', compact('products', 'productMetas', 'productCategoriesFavorite', 'expertAdvices'));
    }

    public function categoryProducts($categorySlug)
    {
        $selectedCategory = ProductCategory::where('slug', $categorySlug)->first();
        $productCategoriesFavorite = ProductCategory::where('favorite_flag', 1)->get();
        if ($selectedCategory) {
            //$products = $selectedCategory->products;
            $products = Product::with(['files', 'categories'])->whereHas('categories', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })->where('status', 'published')->orderBy('highlighted', 'asc')->orderBy('price', 'asc')->get();
            $products = $this->updateProductsWithAction($products);
            $productMetas = getOption('product_metas_opt', []);
            $expertAdvices = Post::with('image')->whereHas('categories', function ($query) {
                $query->where('slug', 'saveti-strucnjaka');
            })->where('highlighted', 1)->get();
            return view('frontend.themes.' . $this->theme . '.products', compact('products', 'productMetas', 'selectedCategory', 'productCategoriesFavorite', 'expertAdvices'));
        } else {
            return $this->product($categorySlug);
        }
    }

    public function actionProducts($actionSlug)
    {
        $action = ProductAction::first();
        $productsOnAction = json_decode($action['products']);
        $products = Product::whereIn('id', $productsOnAction)->get();
        $products = $this->updateProductsWithAction($products);
        $productMetas = getOption('product_metas_opt', []);
        return view('frontend.themes.' . $this->theme . '.products', compact('products', 'productMetas', 'action'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();

        // Handle 404
        if (!$product) {
            return view('frontend.themes.' . $this->theme . '.404', []);
        }

        $productMetas = getOption('product_metas_opt', []);
        $product = $this->updateProductWithAction($product);
        $productFields = ProductField::all();
        $productFields = addValuesToProductFields($productFields, $product->id);
        $fields = [];
        foreach ($productFields as $pField) {
            $fields[$pField->name] = $pField->value;
        }
        $singleProductPosts = Post::where('product_single_display', 1)->where('status', 'published')->orderBy('created_at', 'desc')->get()->take(3);
        return view('frontend.themes.' . $this->theme . '.product', compact('product', 'productMetas', 'fields', 'singleProductPosts'));
    }

    public function packages(Request $request)
    {
        $investmentPrice = '';
        if (isset($request->investment_price) && $request->investment_price !== '') {
            $investmentPrice = intval($request->investment_price);
            $targetValue = $investmentPrice;
            $percentage = 0.20; // 20%
            $minValue = $targetValue - ($targetValue * $percentage);
            $maxValue = $targetValue + ($targetValue * $percentage);
        }
        if ($investmentPrice == '') {
            $packages = GoldPackage::with(['products'])->orderBy('price', 'asc')->get();
        } else {
            $packages = GoldPackage::with(['products'])->whereBetween('price', [$minValue, $maxValue])->orderBy('price', 'asc')->get();
        }

        $packagePriceOptions = getOption('package_select_range_opt', '');
        $packagePriceOptionsArray = [];
        if ($packagePriceOptions != '') {
            $packagePriceOptionsArray = explode(',', $packagePriceOptions);
        }

        $expertAdvices = Post::with('image')->whereHas('categories', function ($query) {
            $query->where('slug', 'saveti-strucnjaka');
        })->where('highlighted', 1)->get();
        return view('frontend.themes.' . $this->theme . '.packages', compact('packages', 'expertAdvices', 'investmentPrice', 'packagePriceOptionsArray'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'published')->first();

        // Handle 404
        if (!$page) {
            return view('frontend.themes.' . $this->theme . '.404', []);
        }

        return view('frontend.themes.' . $this->theme . '.page', compact('page'));
    }

    public function posts()
    {
        $posts = Post::with(['categories'])->where('status', 'published')->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.themes.' . $this->theme . '.posts', compact('posts'));
    }

    public function categoryPosts($categorySlug)
    {
        $selectedCategory = PostCategory::where('slug', $categorySlug)->first();
        if ($selectedCategory) {
            $posts = Post::with('image')->whereHas('categories', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })->where('status', 'published')->orderBy('created_at', 'desc')->paginate(10);
            return view('frontend.themes.' . $this->theme . '.posts', compact('posts', 'selectedCategory'));
        } else {
            return $this->post($categorySlug);
        }
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $randomProduct = Product::where('price_avans', '<', 200000)->inRandomOrder()->first();
        // Handle 404
        if (!$post) {
            return view('frontend.themes.' . $this->theme . '.404', []);
        }

        return view('frontend.themes.' . $this->theme . '.post', compact('post', 'randomProduct'));
    }

    public function contact()
    {
        return view('frontend.themes.' . $this->theme . '.contact');
    }

    public function about()
    {
        return view('frontend.themes.' . $this->theme . '.about');
    }

    public function faqs()
    {
        $faqs = Faq::all();
        return view('frontend.themes.' . $this->theme . '.faqs', compact('faqs'));
    }

    public function wholesale()
    {
        return view('frontend.themes.' . $this->theme . '.wholesale');
    }

    public function goldprice()
    {
        return view('frontend.themes.' . $this->theme . '.goldprice');
    }

    public function investmentgold()
    {
        return view('frontend.themes.' . $this->theme . '.investmentgold');
    }

    public function investmentsilver()
    {
        $products = Product::with('files')->whereHas('categories', function ($query) {
            $query->where('slug', 'srebrne-poluge');
        })->where('status', 'published')->orderBy('created_at', 'desc')->get();
        return view('frontend.themes.' . $this->theme . '.investmentsilver', compact('products'));
    }

    public function royalmint()
    {
        $products = Product::with('files')->whereHas('categories', function ($query) {
            $query->where('slug', 'royal-mint');
        })->where('status', 'published')->orderBy('created_at', 'desc')->get();
        return view('frontend.themes.' . $this->theme . '.royalmint', compact('products'));
    }

    public function updateProductsWithAction($products)
    {
        // Handle Valid Action
        $action = ProductAction::first(['name', 'products', 'discount', 'ends_at', 'description']);
        if ($action) {
            $productsOnAction = json_decode($action['products']);
            $discount = $action['discount'];
            foreach ($products as $product) {
                if (in_array($product->id, $productsOnAction)) {
                    $product->price_old = $product->price;
                    $product->price = $product->price * ((100 - $discount) / 100);
                    $product->action = $action->name;
                    $product->actionDate = $action->ends_at;
                    $product->actionDescription = $action->description;
                }
            }
        }
        return $products;
    }

    public function updateProductWithAction($product)
    {
        // Handle Valid Action
        $action = ProductAction::first(['name', 'products', 'discount', 'ends_at', 'description']);
        if ($action) {
            $productsOnAction = json_decode($action['products']);
            $discount = $action['discount'];
            if (in_array($product->id, $productsOnAction)) {
                $product->price_old = $product->price;
                $product->price = $product->price * ((100 - $discount) / 100);
                $product->action = $action->name;
                $product->actionDate = $action->ends_at;
                $product->actionDescription = $action->description;
            }
        }
        return $product;
    }
}
