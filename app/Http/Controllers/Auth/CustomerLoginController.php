<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Continent;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        $continents = Continent::all();
        return view('auth.customer-login', compact('continents'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            session(['currentUserEmail' => $request->email]);
            return redirect()->intended(route('customer.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
