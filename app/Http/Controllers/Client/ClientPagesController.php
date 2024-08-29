<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ClientPagesController extends Controller
{
    /**
     * Login Page
     *
     * @return View
     * */
    public function login(){
        $pageData = [
            'pageTitle'         => 'Secure Login - Access Your Account ',
            'pageDescription'   => 'Welcome! Log in securely using your email and password. Use "Remember Me" for quick access next time, and reset your password easily if needed.',
            'crumbs'            => []
        ];
        return view('client.pages.auth.login',$pageData);
    }
    /**
     * Register Page
     * */
    public function register(){
        $pageData = [
            'pageTitle'         => 'Create Your Account - Easy Registration',
            'pageDescription'   => 'Sign up quickly and easily. Fill in your details to create a new account and start enjoying our services immediately.',
            'crumbs'            => []
        ];
        return view('client.pages.auth.register',$pageData);
    }
    /**
     * Forget Password
     * */
    public function forgetPassword(){
        $pageData = [
            'pageTitle'         => 'Forgot Password - Reset Your Access',
            'pageDescription'   => 'Lost your password? Enter your email to receive a reset link and regain access to your account in a few simple steps.',
            'crumbs'            => []
        ];
        return view('client.pages.auth.forgetPassword',$pageData);
    }
    /**
     * Home Page
     * */
    public function home(){
        $pageData = [
            'pageTitle'         => 'Welcome to Our Website - Explore Now',
            'pageDescription'   => 'Discover our latest updates, featured content, and key services. Explore everything we offer and stay connected with our community.',
            'crumbs'            => []
        ];
        return view('client.pages.home',$pageData);
    }
    /**
     * Contact Page
     * */
    public function contact(){
        $pageData = [
            'pageTitle'         => 'Contact Us - We’re Here to Help',
            'pageDescription'   => 'Get in touch with us for any inquiries or support. Use our contact form to reach out, and we’ll respond promptly to assist you.',
            'crumbs'            => []
        ];
        return view('client.pages.contact',$pageData);
    }
    /**
     * About us
     * */
    public function about(){
        $pageData = [
            'pageTitle'         => 'About Us - Learn More About Our Team',
            'pageDescription'   => 'Get to know our mission, values, and the team behind our services. Learn how we strive to make a difference and serve our community.',
            'crumbs'            => []
        ];
        return view('client.pages.about',$pageData);
    }
    /**
     * Terms and Conditions
     * */
    public function terms(){
        $pageData = [
            'pageTitle'         => 'Terms and Conditions - Understand Our Policies',
            'pageDescription'   => 'Read our terms and conditions to understand the rules and guidelines governing your use of our website and services.',
            'crumbs'            => []
        ];
        return view('client.pages.terms',$pageData);
    }
    /**
     * Categories
     * */
    public function categories(){
        $pageData = [
            'pageTitle'         => 'Blog Categories - Find Your Interests',
            'pageDescription'   => 'Explore our blog categories to find articles that match your interests. From technology to lifestyle, discover content that matters to you.',
            'crumbs'            => []
        ];
        return view('client.pages.categories',$pageData);
    }
    /**
     * Privacy Policy
     * */
    public function privacy(){
        $pageData = [
            'pageTitle'         => 'Privacy Policy - Your Data Protection',
            'pageDescription'   => 'Learn how we collect, use, and protect your personal information. Our privacy policy ensures your data is handled with the utmost care.',
            'crumbs'            => []
        ];
        return view('client.pages.privacy',$pageData);
    }
    /**
     * Blogs Page
     * */
    public function blogs(){
        $pageData = [
            'pageTitle'         => 'Blog Articles - Stay Updated with Our Insights',
            'pageDescription'   => 'Read our latest blog posts on various topics. Stay informed with our expert insights, tips, and updates from the industry.',
            'crumbs'            => []
        ];
        return view('client.pages.blogs',$pageData);
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
