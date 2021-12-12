<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        //dd($user->hasRole('superadministrator'));
        if($user->hasRole('superadministrator')){
            return redirect('/admin-dashboard');
        }
        if($user->hasRole('user')){
            return redirect('/client-dashboard');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
