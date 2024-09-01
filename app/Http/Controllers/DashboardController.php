<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            'auth'
        ];
    }
    public function dashboard()
    {
        return view('restricted.appPages.dashboard');
    }
    /**
     * Logout the user
     */
    public function logout(){
        auth()->logout();
        return redirect()->route('app.login');
    }
}
