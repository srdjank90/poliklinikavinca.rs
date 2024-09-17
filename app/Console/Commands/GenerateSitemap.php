<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.xml file';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();
        // Static pages
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
            ->add(Url::create('/o-nama')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/korpa')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/zavrsi-kupovinu')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/zavrsi-kupovunu/uspesno')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/proizvodi')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/investicioni-kalkulator')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/paketi-porudzbina')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/najcesca-pitanja')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/veleprodaja-zlata')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/cena-zlata')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/investiciono-zlato')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/investiciono-srebro')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/royal-mint')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/blog')->setPriority(0.9)->setChangeFrequency('weekly'))
            ->add(Url::create('/kontakt')->setPriority(0.6)->setChangeFrequency('yearly'));

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
    }
}
