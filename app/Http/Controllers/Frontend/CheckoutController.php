<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\GoldPackage;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\Shipping;
use App\Notifications\CheckoutNotification;
use App\Notifications\OrderNotification;
use App\Notifications\PackageCheckoutNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    public function createOrder(Request $request)
    {
        $subtotalPrice = 0;
        $totalPrice = 0;
        $shippingPrice = 0;
        $pdvPrice = 0;

        $orderProducts = json_decode($request->products);
        $order = new Order();

        $orderData = [
            'first_name' => $request->order_first_name,
            'last_name' => $request->order_last_name,
            'jmbg' => $request->order_jmbg,
            'email' => $request->order_email,
            'phone' => $request->order_phone,
            'address' => $request->order_address,
            'country' => 'Srbija',
            'city' => $request->order_city,
            'zip' => $request->order_zip,
            'payment_method_id' => $request->order_payment_method_id,
            'shipping_service_id' => $request->order_shipping_service_id,
            'status' => 'pending',
            'user_id' => Auth::user() ? Auth::user()->id : null
        ];

        $id = $order->create($orderData)->id;

        // Create OID
        $oid = sprintf("%08d", $id);
        $oid = "ZS-" . $oid;

        $order = Order::with(['shipp', 'pmethod'])->find($id);

        // Order products
        foreach ($orderProducts as $product) {
            $productData = Product::find($product->id);
            $quantity = $product->quantity;
            if (strpos($productData->name, 'Srebrn') !== false) {
                $subtotalPrice = $subtotalPrice + ($product->price * 0.8) * $quantity;
            } else {
                $subtotalPrice = $subtotalPrice + $product->price * $quantity;
            }

            $orderProduct = new OrderProduct();
            $avans = isset($product->avans) && $product->avans == true ? true : false;
            $orderProductData = [
                'order_id' => $id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'meta_data' => json_encode($product->meta),
                'single_price' => $product->price,
                'total_price' => $quantity * $product->price,
                'avans_price' => $avans
            ];
            $pid = $orderProduct->create($orderProductData)->id;
        }

        // Shipping price
        $shippingPriceObject = Shipping::find($request->order_shipping_service_id);
        if ($shippingPriceObject) {
            $shippingPrice = $shippingPriceObject->price * 0.8;
            $pdvPrice = $shippingPriceObject->price * 0.2;
        }

        $orderProductsDb = OrderProduct::with('product')->where('order_id', $order->id)->get();

        foreach ($orderProductsDb as $oProduct) {
            if (strpos($oProduct->product->name, 'Srebrn') !== false) {
                $oProduct['single_price_without_pdv'] = $oProduct->single_price * 0.8;
                $oProduct['pdv'] = $oProduct->single_price * 0.2;
                $oProduct['total_price_without_pdv'] = $oProduct->single_price * 0.8 * $oProduct->quantity;
                $oProduct['total_pdv'] = $oProduct->single_price * 0.2 * $oProduct->quantity;
                $pdvPrice += $oProduct['total_pdv'];
            }
        }

        // Calculate total price (subtotal + shipping + pdv)
        $totalPrice = $subtotalPrice + $shippingPrice + $pdvPrice;
        $order->update(['oid' => $oid, 'subtotal' => $subtotalPrice, 'pdv' => $pdvPrice, 'total' => $totalPrice, 'shipping' => $shippingPrice]);

        try {
            Mail::to($order->email)->send(new OrderMail($order, $orderProductsDb, $pdvPrice));
            $order->update(['invoice_sent' => 1]);
            //Mail::to('info@minute.shop')->send(new OrderMail($order));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->route('frontend.checkout.success', compact('order'));
    }

    public function createPackageOrder(Request $request)
    {
        $packageId = $request->input('packageId');
        $packageName = $request->input('packageName');
        $packagePrice = $request->input('packagePrice');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $package = GoldPackage::find($packageId);

        Notification::route('mail', 'internet.prodavnica@zlatnistandard.rs')->notify(new PackageCheckoutNotification($package, $email, $phone));

        return response()->json(['message' => 'Sent']);
    }
}
