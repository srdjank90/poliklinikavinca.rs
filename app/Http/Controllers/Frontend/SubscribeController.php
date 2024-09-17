<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Uspešno ste se prijavili'], 201);
    }
}
