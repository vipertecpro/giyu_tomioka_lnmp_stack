<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ClientPagesController extends Controller
{

    /**
     * Login Page
     * */
    public function login(){
        return view('client.pages.auth.login');
    }
    /**
     * Home Page
     * */
    public function home(){
        return view('client.pages.home');
    }
    /**
     * Contact Page
     * */
    public function contact(){
        return view('client.pages.contact');
    }
    /**
     * About us
     * */
    public function about(){
        return view('client.pages.about');
    }
    /**
     * Terms and Conditions
     * */
    public function terms(){
        return view('client.pages.terms');
    }
    /**
     * Privacy Policy
     * */
    public function privacy(){
        return view('client.pages.privacy');
    }
    /**
     * Blogs Page
     * */
    public function blogs(){
        return view('client.pages.blogs');
    }
    /**
     * Single Blogs Page
     * */
    public function singleBlog(){
        return view('client.pages.singleBlog');
    }
    /**
     * Category Blogs Page
     * */
    public function categoryForBlogs(){
        return view('client.pages.categoryBlogs');
    }
    /**
     * Tag Blogs Page
     * */
    public function tagForBlogs(){
        return view('client.pages.tagBlogs');
    }
}
