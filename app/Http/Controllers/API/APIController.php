<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class APIController extends Controller
{
    public function updatePricesApi()
    {
        $url = env('SCRAPER_API', 'https://radoviutoku.com/api');
        $response = Http::withoutVerifying()->get($url . '/prices');

        if ($response->successful()) {
            $prices = $response->json();

            foreach ($prices as $price) {
                $product = Product::where('external_id', $price['product_id'])->first();
                if ($product) {
                    $product->price = isset($price['regular_price']) ? $price['regular_price'] : 0;
                    $product->price_avans = $price['selling_price'];
                    $product->save();
                }
            }
        } else {
            Log::info('Problem sa povlačenjem cena!');
        }

        return response('Gotovo!');
    }
}
