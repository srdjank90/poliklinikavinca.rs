<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
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
            ->add(Url::create('/blog')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/najcesca-pitanja')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/cenovnik')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/zakazi-pregled')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/usluge')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/doktori')->setPriority(0.8)->setChangeFrequency('monthly')->setLastModificationDate(Carbon::now()->subDays(6)))
            ->add(Url::create('/kontakt')->setPriority(0.6)->setChangeFrequency('yearly')->setLastModificationDate(Carbon::now()->subDays(6)));

        // Add products
        $services = Service::all(); // Fetch all products from the database
        foreach ($services as $service) {
            $sitemap->add(Url::create('/usluga/' . $service->slug)
                ->setPriority(0.7)
                ->setChangeFrequency('weekly')
                ->setLastModificationDate($service->updated_at));
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
