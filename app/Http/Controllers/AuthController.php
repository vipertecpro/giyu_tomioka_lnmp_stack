<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;

class AuthController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            'guest'
        ];
    }
    public function login()
    {
        $pageData = [
            'pageTitle' => 'Login',
            'pageDescription' => 'Login to your account',
        ];
        return view('restricted.authPages.login',$pageData);
    }

    public function submitLogin()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!auth()->attempt($credentials)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        return redirect()->route('app.dashboard.index');
    }
}
