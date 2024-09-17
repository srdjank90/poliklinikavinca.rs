<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippings = Shipping::all();

        return view('backend.settings.shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipping = new Shipping();

        return view('backend.settings.shipping.create', compact('shipping'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shipping = new Shipping($request->all());
        $shipping->save();
        return redirect()->route('backend.settings.shippings.index');
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
        $shipping = Shipping::find($id);

        return view('backend.settings.shipping.edit', compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shipping = Shipping::find($id);
        $shipping->update($request->all());
        if (isset($request->available)) {
            $shipping->available = 1;
        } else {
            $shipping->available = 0;
        }
        $shipping->save();

        return redirect()->route('backend.settings.shippings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping = Shipping::find($id);
        $shipping->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }
}
