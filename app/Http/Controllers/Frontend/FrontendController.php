<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;

class FrontendController extends Controller
{
    protected $theme = 'lika';

    public function __construct()
    {
        $this->theme = getOption('theme_active_opt', 'lika');
    }

    public function index()
    {
        $variable = 'test';
        return view('frontend.themes.' . $this->theme . '.index', compact('variable'));
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
}
