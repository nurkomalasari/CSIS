<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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

    // protected function redirectTo()
    // {
    //     if (Auth()->user()->role == 1) {
    //         return route('admin.homepage');
    //     } elseif (Auth()->user()->role == 2) {
    //         return route('cs.homepage');
    //     }
    //     // return '/login';
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $input = $request->all();
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->role == 1) {
    //             return redirect()->route('admin.homepage');
    //         } elseif (auth()->user()->role == 2) {
    //             return redirect()->route('cs.homepage');
    //         }
    //     } else {
    //         return redirect()->route('login')->with('error', 'email and password are wrong');
    //     }
    // }

    protected function authenticated(Request $request, $user)
    {

        if ($user->hasRole('superAdmin')) {
            return redirect()->route('admin.homepage');
        } else if ($user->hasRole('cs')) {
            return redirect()->route('cs.homepage');
        } else if ($user->hasRole('teknisi')) {
            return redirect()->route('teknisi.homepage');
            // dd($user);
        }

        return redirect()->route('login')->with('error', 'email and password are wrong');
        // dd($user);
        // if ($user->hasRole('cs')) {
        //     return redirect()->route('dashboard_cs');
        // }
    }
}
