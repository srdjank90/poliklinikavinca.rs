<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\Option;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Spatie\SchemaOrg\Schema;

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
        $seoIndex = Option::where('key', 'like', '%setting_seo%')->pluck('value', 'key')->toArray();
        $popularServices = Service::orderBy('created_at', 'asc')->limit(4)->get();
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontend.themes.' . $this->theme . '.index', compact('variable', 'popularServices', 'latestPosts', 'seoIndex'));
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
        $blogPostSchema = Schema::blogPosting()
            ->headline($post->title)
            ->articleBody(Str::limit(strip_tags($post->content), 200))
            //->author($post->author->name)
            ->datePublished($post->created_at->toIso8601String())
            ->url(url()->current());
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        // Handle 404
        if (!$post) {
            return view('frontend.themes.' . $this->theme . '.404', []);
        }

        return view('frontend.themes.' . $this->theme . '.post', compact('post', 'latestPosts', 'blogPostSchema'));
    }

    public function services()
    {
        $services = Service::paginate(100);
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontend.themes.' . $this->theme . '.services', compact('services', 'latestPosts'));
    }

    public function service($slug)
    {
        $service = Service::with(['items', 'faqs'])->where('slug', $slug)->first();
        $randomServices = Service::inRandomOrder()->take(3)->get();
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        $doctors = Doctor::where('service_id', $service->id)->get();
        if (!$service) {
            return view('frontend.themes.' . $this->theme . '.404', []);
        }
        return view('frontend.themes.' . $this->theme . '.service', compact('service', 'randomServices', 'latestPosts', 'doctors'));
    }

    public function doctors()
    {
        $doctors = Doctor::paginate(100);
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontend.themes.' . $this->theme . '.doctors', compact('doctors', 'latestPosts'));
    }

    public function doctor($slug)
    {
        $doctor = Doctor::where('slug', $slug)->first();
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        if (!$doctor) {
            return view('frontend.themes.' . $this->theme . '.404', []);
        }

        return view('frontend.themes.' . $this->theme . '.doctor', compact('doctor', 'latestPosts'));
    }

    public function contact()
    {
        return view('frontend.themes.' . $this->theme . '.contact');
    }

    public function pricing()
    {
        $services = Service::with(['items', 'faqs'])->get();
        $randomServices = Service::inRandomOrder()->take(3)->get();
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontend.themes.' . $this->theme . '.pricing', compact('latestPosts', 'randomServices', 'services'));
    }

    public function appointment()
    {
        return view('frontend.themes.' . $this->theme . '.appointment');
    }

    public function about()
    {
        $latestPosts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        $doctors = Doctor::all();
        return view('frontend.themes.' . $this->theme . '.about', compact('latestPosts', 'doctors'));
    }

    public function faqs()
    {
        $faqs = Faq::all();
        return view('frontend.themes.' . $this->theme . '.faqs', compact('faqs'));
    }
}
