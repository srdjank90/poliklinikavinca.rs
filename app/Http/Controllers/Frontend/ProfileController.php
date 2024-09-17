<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\UserAddress;
use Faker\Provider\ar_EG\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected $theme = 'lika';

    public function __construct()
    {
        $this->middleware('auth');
        $this->theme = getOption('theme_active_opt', 'lika');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('frontend.themes.' . $this->theme . '.user.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userID = Auth::user()->id;
        $user = User::find($userID);
        $user->update($request->all());

        return redirect()->back()->withMessage('Informacije o profilu uspešno ažurirane');
    }

    public function security()
    {
        $user = Auth::user();
        return view('frontend.themes.' . $this->theme . '.user.security', compact('user'));
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->withMessage('Lozinka je uspešno promenjena!');
    }

    public function notifications()
    {
        $user = Auth::user();
        return view('frontend.themes.' . $this->theme . '.user.notifications', compact('user'));
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->paginate(5);
        return view('frontend.themes.' . $this->theme . '.user.orders', compact('user', 'orders'));
    }

    public function wishlist()
    {
        $user = Auth::user();
        return view('frontend.themes.' . $this->theme . '.user.wishlist', compact('user'));
    }

    public function address()
    {
        $user = Auth::user();
        $addresses = UserAddress::where('user_id', $user->id)->get();
        return view('frontend.themes.' . $this->theme . '.user.addresses.index', compact('user', 'addresses'));
    }

    public function addressCreate()
    {
        return view('frontend.themes.' . $this->theme . '.user.addresses.create');
    }

    public function addressStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['primary'] = $request['primary'] ? 1 : 0;
        $data['user_id'] = Auth::user()->id;
        $address = new UserAddress();
        $addressNew = $address->create($data);
        $this->addressHandlePrimary($addressNew->id);

        return redirect()->route('frontend.profile.address');
    }

    public function addressEdit($id)
    {
        $address = UserAddress::find($id);
        return view('frontend.themes.gold.user.addresses.edit', compact('address'));
    }

    /**
     * Address Update
     * @param Request $request
     * @param Integer $id
     */
    public function addressUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $address = UserAddress::find($id);
        $data = $request->all();
        $data['primary'] = $request['primary'] ? 1 : 0;
        $address->update($data);
        $this->addressHandlePrimary($address->id);
        return back()->withMessage('Promene su uspešno sačuvane!');
    }

    public function addressHandlePrimary($id)
    {
        $addresses = UserAddress::where('user_id', Auth::user()->id)->where('id', '!=', $id)->update(['primary' => 0]);
    }

    public function addressDelete($id)
    {
        $address = UserAddress::findOrFail($id);
        $address->delete();
        return response()->json(['success' => true]);
    }
}
