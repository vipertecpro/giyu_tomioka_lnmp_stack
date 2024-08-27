<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ClientDashboardPagesController extends Controller
{
    public function dashboard(){
        return view('client.pages.dashboard.index');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('client.home');
    }
}
