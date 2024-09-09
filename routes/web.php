<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/categories',[ClientPagesController::class,'categories'])->name('categories');
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
        'middleware' => ['auth']
    ],function(){
        Route::get('/',[ClientDashboardPagesController::class,'dashboard'])->name('index');
        Route::post('/logout',[ClientDashboardPagesController::class,'logout'])->name('logout');
    });
});

Route::group([
    'domain'    => env('APP_ADMIN_DOMAIN'),
    'as'        => 'app.',
],function(){
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'submitLogin'])->name('submitLogin');
    Route::group([
        'prefix'    => 'dashboard',
        'as'        => 'dashboard.',
        'middleware' => ['auth']
    ],function(){
        Route::get('/',[DashboardController::class,'dashboard'])->name('index');
        Route::post('/logout',[DashboardController::class,'logout'])->name('logout');
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
            Route::post('/updateAvatar',[UsersController::class,'updateAvatar'])->name('updateAvatar');
            Route::delete('/removeAvatar',[UsersController::class,'removeAvatar'])->name('removeAvatar');
            Route::get('/details/{user_id}',[UsersController::class,'details'])->name('details');
            Route::delete('/delete/{user_id}',[UsersController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[UsersController::class,'deleteAll'])->name('deleteAll');
            Route::post('/import',[UsersController::class,'import'])->name('import');
            Route::post('/export',[UsersController::class,'export'])->name('export');
        });
        Route::group([
            'prefix'    => 'tags',
            'as'        => 'tags.',
        ],function(){
            Route::get('/',[TagController::class,'list'])->name('list');
            Route::get('/create',[TagController::class,'create'])->name('create');
            Route::post('/form',[TagController::class,'form'])->name('form');
            Route::delete('/delete/{tag_id}',[TagController::class,'delete'])->name('delete');
            Route::delete('/deleteAll',[TagController::class,'deleteAll'])->name('deleteAll');
            Route::post('/import',[TagController::class,'import'])->name('import');
            Route::post('/export',[TagController::class,'export'])->name('export');
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
