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
     * Register Page
     * */
    public function register(){
        return view('client.pages.auth.register');
    }
    /**
     * Forget Password
     * */
    public function forgetPassword(){
        return view('client.pages.auth.forgetPassword');
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
     * Categories
     * */
    public function categories(){
        return view('client.pages.categories');
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
