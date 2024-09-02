<?php

use App\Http\Controllers\InternalController;

Route::group([
        'prefix'    => 'internal',
        'as'        => 'internal.',
    ],function(){
       Route::post('/users',[InternalController::class,'users'])->name('users');
       Route::post('/roles',[InternalController::class,'roles'])->name('roles');
       Route::post('/permissions',[InternalController::class,'permissions'])->name('permissions');
       Route::post('/blogs',[InternalController::class,'blogs'])->name('blogs');
       Route::post('/tags',[InternalController::class,'blogs'])->name('blogs');
       Route::post('/categories',[InternalController::class,'blogs'])->name('blogs');
       Route::post('/comments',[InternalController::class,'blogs'])->name('blogs');
    });
