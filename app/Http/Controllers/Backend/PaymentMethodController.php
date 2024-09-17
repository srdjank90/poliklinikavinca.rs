<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return view('backend.settings.payment.methods.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method = new PaymentMethod();

        return view('backend.settings.payment.methods.create', compact('method'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $method = new PaymentMethod($request->all());
        $method->save();
        return redirect()->route('backend.settings.payment-methods.index');
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
        $method = PaymentMethod::find($id);

        return view('backend.settings.payment.methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $method = PaymentMethod::find($id);
        $method->update($request->all());
        if (isset($request->available)) {
            $method->available = 1;
        } else {
            $method->available = 0;
        }
        $method->save();

        return redirect()->route('backend.settings.payment-methods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $method = PaymentMethod::find($id);
        $method->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }
}
