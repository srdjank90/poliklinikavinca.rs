<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateController extends Controller
{
    public function sitemap()
    {
        $sitemap = Sitemap::create();
        // Static pages
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/o-nama')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/korpa')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/zavrsi-kupovinu')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/zavrsi-kupovunu/uspesno')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/proizvodi')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/investicioni-kalkulator')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/paketi-porudzbina')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/najcesca-pitanja')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/veleprodaja-zlata')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/cena-zlata')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/investiciono-zlato')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/investiciono-srebro')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/royal-mint')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/blog')->setPriority(0.9)->setChangeFrequency('weekly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/kontakt')->setPriority(0.6)->setChangeFrequency('yearly')->setLastModificationDate(Carbon::now()->subDays(6)));

        // Add products
        $products = Product::all(); // Fetch all products from the database
        foreach ($products as $product) {
            $sitemap->add(Url::create('/proizvodi/' . $product->slug)
                ->setPriority(0.7)
                ->setChangeFrequency('weekly')
                ->setLastModificationDate($product->updated_at));
        }

        // Add posts
        $posts = Post::all(); // Fetch all products from the database
        foreach ($posts as $post) {
            $sitemap->add(Url::create('/blog/' . $post->slug)
                ->setPriority(0.7)
                ->setChangeFrequency('weekly')
                ->setLastModificationDate($post->updated_at));
        }

        // Add pages
        $pages = Page::all(); // Fetch all products from the database
        foreach ($pages as $page) {
            $sitemap->add(Url::create('/' . $page->slug)
                ->setPriority(0.7)
                ->setChangeFrequency('weekly')
                ->setLastModificationDate($page->updated_at));
        }

        // Write sitemap data to sitemap.xml
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 'Sitemap generated successfully!';
    }
}
