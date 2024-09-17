<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;

class OrderController extends BackendController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $orders = Order::with(['orderProducts', 'shipp', 'pmethod'])
                ->where('first_name', 'LIKE', '%' . $search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%')
                ->orWhere('address', 'LIKE', '%' . $search . '%')
                ->orWhere('city', 'LIKE', '%' . $search . '%')
                ->orWhere('zip', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%' . $search . '%')
                ->orWhere('created_at', 'LIKE', '%' . $search . '%')
                ->latest()->paginate(15);
        } else {
            $orders = Order::with(['orderProducts', 'shipp', 'pmethod'])->latest()->paginate(15);
        }

        return view("backend.orders.index", compact("orders", 'search'));
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
        //
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
        $order = Order::with(['orderProducts', 'shipp', 'pmethod'])->findOrFail($id);
        return view("backend.orders.edit", compact("order"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Settings for Pages
     */
    public function settings()
    {
        $orders = Order::all();
        return view('backend.orders.settings', compact(['orders']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function invoice(string $id)
    {
        $order = Order::with('orderProducts')->findOrFail($id);
        return view("backend.orders.invoice", compact("order"));
    }

    public function downloadInvoice($id)
    {
        $theme = getOption('theme_active_opt', 'lika');
        $order = Order::find($id);

        $data = [
            'order' => $order,
            'oid' => $order->oid,
        ];

        $pdf = PDF::loadView('frontend.themes.' . $theme . '.pdf.invoice', $data);

        return $pdf->download($order->oid . '.pdf');
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {

        $order = Order::with('orderProducts')->findOrFail($id);
        $status = $request->status;
        $shipping_number = $request->shipping_number;
        if ($shipping_number !== "") {
            $order->shipping_number = $shipping_number;
        }

        $order->status = $status;
        $order->save();

        if ($status === "shipping" && $shipping_number !== '') {
            try {
                //Mail::to($order->email)->send(new OrderShippingMail($order));
                return response()->json(['success' => true, 'error' => null, 'order' => $order], 200);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage(), 'order' => $order], 400);
            }
        }

        return response()->json(['success' => true, 'error' => null, 'order' => $order], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $orderProducts = OrderProduct::where('order_id', 'id')->get();
        foreach ($orderProducts as $oProduct) {
            $oProduct->delete();
        }
        $order->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }
}
