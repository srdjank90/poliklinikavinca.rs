<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    protected $theme = 'medical';

    public function __construct()
    {
        $this->theme = getOption('setting_theme_active_opt', 'medical');
    }

    public function sendAppointmentForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // For demonstration, we'll use Laravel's built-in email
        Mail::send('frontend.themes.' . $this->theme . '.emails.appointment', ['request' => $request], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('info@studiozadizajn.rs')->subject('Zakazivanje pregleda');
        });

        // Response
        return response()->json(['message' => 'Poruka je uspešno poslata!']);
    }
}
