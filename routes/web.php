<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\ClientDashboardPagesController;
use App\Http\Controllers\Client\ClientPagesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GlobalSettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::group([
    'domain'    => env('APP_DOMAIN'),
    'as'        => 'client.',
],function(){
    Route::get('/',[ClientPagesController::class,'home'])->name('home');
    Route::get('/contact',[ClientPagesController::class,'contact'])->name('contact');
    Route::post('/contact',[ClientPagesController::class,'contact'])->name('submitContact');
    Route::get('/about',[ClientPagesController::class,'about'])->name('about');
    Route::get('/terms',[ClientPagesController::class,'terms'])->name('terms');
    Route::get('/privacy',[ClientPagesController::class,'privacy'])->name('privacy');
    Route::get('/blogs',[ClientPagesController::class,'blogs'])->name('blogs');
    Route::get('/blogs/{blog_slug}',[ClientPagesController::class,'singleBlog'])->name('singleBlog');
    Route::get('/category/{category_slug}',[ClientPagesController::class,'categoryForBlogs'])->name('categoryForBlogs');
    Route::get('/tag/{tag_slug}',[ClientPagesController::class,'tagForBlogs'])->name('tagForBlogs');
    Route::get('/login',[ClientPagesController::class,'login'])->name('login');
    Route::post('/login',[ClientPagesController::class,'submitLogin'])->name('submitLogin');
    Route::get('/register',[ClientPagesController::class,'register'])->name('register');
    Route::post('/register',[ClientPagesController::class,'submitRegister'])->name('submitRegister');
    Route::get('/forget-password',[ClientPagesController::class,'forgetPassword'])->name('forgetPassword');
    Route::post('/forget-password',[ClientPagesController::class,'submitForgetPassword'])->name('submitForgetPassword');
    Route::group([
        'prefix'    => 'dashboard',
        'as'        => 'dashboard.',
    ],function(){
        Route::get('/',[ClientDashboardPagesController::class,'dashboard'])->name('dashboard');
        Route::post('/logout',[ClientDashboardPagesController::class,'logout'])->name('logout');
    });
});

Route::group([
    'domain'    => env('APP_ADMIN_DOMAIN'),
    'as'        => 'app.',
],function(){
    Route::get('/',[DashboardController::class,'login'])->name('login');
    Route::post('/login',[DashboardController::class,'login'])->name('submitLogin');
    Route::group([
        'prefix'    => 'dashboard',
        'as'        => 'dashboard.',
    ],function(){
        Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::group([
            'prefix'    => 'globalSettings',
            'as'        => 'globalSettings.',
        ],function(){
            Route::get('/',[GlobalSettingController::class,'index'])->name('update');
            Route::post('/',[GlobalSettingController::class,'update'])->name('update');
        });
        Route::group([
            'prefix'    => 'roles',
            'as'        => 'roles.',
        ],function(){
            Route::get('/',[RoleController::class,'list'])->name('list');
            Route::get('/create',[RoleController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[RoleController::class,'edit'])->name('edit');
            Route::post('/form',[RoleController::class,'form'])->name('form');
            Route::delete('/delete',[RoleController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[RoleController::class,'deleteAll'])->name('deleteAll');
        });
        Route::group([
            'prefix'    => 'users',
            'as'        => 'users.',
        ],function(){
            Route::get('/',[UsersController::class,'list'])->name('list');
            Route::get('/create',[UsersController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[UsersController::class,'edit'])->name('edit');
            Route::post('/form',[UsersController::class,'form'])->name('form');
            Route::delete('/delete',[UsersController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[UsersController::class,'deleteAll'])->name('deleteAll');
        });
        Route::group([
            'prefix'    => 'tags',
            'as'        => 'tags.',
        ],function(){
            Route::get('/',[TagController::class,'list'])->name('list');
            Route::get('/create',[TagController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[TagController::class,'edit'])->name('edit');
            Route::post('/form',[TagController::class,'form'])->name('form');
            Route::delete('/delete',[TagController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[TagController::class,'deleteAll'])->name('deleteAll');
        });
        Route::group([
            'prefix'    => 'categories',
            'as'        => 'categories.',
        ],function(){
            Route::get('/',[CategoryController::class,'list'])->name('list');
            Route::get('/create',[CategoryController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[CategoryController::class,'edit'])->name('edit');
            Route::post('/form',[CategoryController::class,'form'])->name('form');
            Route::delete('/delete',[CategoryController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[CategoryController::class,'deleteAll'])->name('deleteAll');
        });
        Route::group([
            'prefix'    => 'pages',
            'as'        => 'pages.',
        ],function(){
            Route::get('/',[PageController::class,'list'])->name('list');
            Route::get('/create',[PageController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[PageController::class,'edit'])->name('edit');
            Route::post('/form',[PageController::class,'form'])->name('form');
            Route::delete('/delete',[PageController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[PageController::class,'deleteAll'])->name('deleteAll');
        });
        Route::group([
            'prefix'    => 'blogs',
            'as'        => 'blogs.',
        ],function(){
            Route::get('/',[BlogController::class,'list'])->name('list');
            Route::get('/create',[BlogController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[BlogController::class,'edit'])->name('edit');
            Route::post('/form',[BlogController::class,'form'])->name('form');
            Route::delete('/delete',[BlogController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[BlogController::class,'deleteAll'])->name('deleteAll');
        });
        Route::group([
            'prefix'    => 'comments',
            'as'        => 'comments.',
        ],function(){
            Route::get('/',[CommentController::class,'list'])->name('list');
            Route::get('/create',[CommentController::class,'create'])->name('create');
            Route::get('/edit/{user_id}',[CommentController::class,'edit'])->name('edit');
            Route::post('/form',[CommentController::class,'form'])->name('form');
            Route::delete('/delete',[CommentController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[CommentController::class,'deleteAll'])->name('deleteAll');
        });
    });
});
