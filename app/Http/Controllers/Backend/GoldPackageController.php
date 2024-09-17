<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GoldPackage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoldPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(REquest $request)
    {
        /// Items per page
        $currency = getOption('product_currency_opt', 'EUR');
        $perPage = getOption('product_per_page_opt', 8);
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $packages = GoldPackage::where('name', 'LIKE', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            $packages = GoldPackage::paginate($perPage);
        }

        return view('backend.packages.index', compact(['packages', 'search', 'currency']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package = new GoldPackage($request->all());
        $package->slug = Str::slug($package->name, '-');
        $package->save();
        $id = $package->id;
        return response()->json(['success' => true, 'error' => null, 'id' => $id, 'url' => route('backend.packages.edit', $id)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currency = getOption('product_currency_opt', 'EUR');
        $package = GoldPackage::with('products')->findOrFail($id);
        $products = Product::all();
        $productsIds = $package->products->pluck('id')->toArray();
        return view('backend.packages.edit', compact(['package', 'products', 'productsIds', 'currency']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info($request->all());
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $productFieldsNames = [];
        array_push($productFieldsNames, 'dynamic_price_activate');
        $package = GoldPackage::find($id);
        $package->update($request->except($productFieldsNames));
        $package->products()->sync($request->products);
        $package->dynamic_price_activate = isset($request->dynamic_price_activate) ? 1 : 0;
        $package->price_dynamic = $this->calculateDynamicPackagePrice($package->products);
        $package->price = $request->price;
        $package->save();

        return redirect()->route('backend.packages.edit', [$id])
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = GoldPackage::find($id);
        $package->products()->sync([]);
        $package->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }

    public function calculateDynamicPackagePrice($products)
    {
        $price = 0;
        foreach ($products as $product) {
            $price += $product->price;
        }
        return $price;
    }

    /**
     * Settings for Products
     */
    public function settings()
    {
        $packages = GoldPackage::all();
        $options = getOptions('package_');
        return view('backend.packages.settings', compact(['packages', 'options']));
    }
}
