<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $theme = 'gold';

    public function __construct()
    {
        $this->theme = getOption('setting_theme_active_opt', 'gold');
    }


    public function sendContactForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // For demonstration, we'll use Laravel's built-in email
        Mail::send('frontend.themes.' . $this->theme . '.emails.contact', ['request' => $request], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('info@poliklinikavinca.rs')->subject('Kontakt sa sajta');
        });

        // Response
        return response()->json(['message' => 'Poruka je uspešno poslata!']);
    }

    public function sendWholesaleForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'person' => 'required',
            'message' => 'required',
        ]);

        // For demonstration, we'll use Laravel's built-in email
        Mail::send('frontend.themes.' . $this->theme . '.emails.wholesale', ['request' => $request], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('info@studiozadizajn.rs')->subject('Veleprodaja formular');
        });

        // Response
        return response()->json(['message' => 'Poruka je uspešno poslata!']);
    }
}
