<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $theme = 'lika';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->theme = getOption('theme_active_opt', 'lika');
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view("frontend.themes." . $this->theme . ".auth.login");
    }


    protected function authenticated(Request $request, $user)
    {
        // Check if the authenticated user has a role
        if ($user->role_id) {
            if (isset($request->page) && $request->page == 'checkout') {
                return redirect()->route('frontend.checkout');
            }
            // Redirect based on the user's role
            switch ($user->role_id) {
                case '1':
                    return redirect()->route('backend');
                    break;
                case '2':
                    return redirect()->route('backend');
                    break;
                case '3':
                default:
                    return redirect()->route('frontend.index');
                    break;
            }
        }

        // If the user does not have a role, redirect to a default route
        return redirect()->route('frontend.index');
    }
}
