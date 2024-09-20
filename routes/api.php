<?php

use App\Http\Controllers\InternalController;
use App\Http\Controllers\WidgetController;

Route::group([
        'prefix'    => 'internal',
        'as'        => 'internal.',
],function(){
       Route::post('/users',[InternalController::class,'users'])->name('users');
       Route::post('/roles',[InternalController::class,'roles'])->name('roles');
       Route::post('/permissions',[InternalController::class,'permissions'])->name('permissions');
       Route::post('/blogs',[InternalController::class,'blogs'])->name('blogs');
       Route::post('/tags',[InternalController::class,'tags'])->name('tags');
       Route::post('/tag',[InternalController::class,'tag'])->name('tag');
       Route::post('/categories',[InternalController::class,'categories'])->name('categories');
       Route::post('/category',[InternalController::class,'category'])->name('category');
       Route::post('/comments',[InternalController::class,'comments'])->name('comments');
       Route::group([
            'prefix'     => 'widgets',
            'as'      => 'widgets.',
       ],function(){
              Route::post('/',[WidgetController::class,'append'])->name('append');
              Route::post('/categories',[WidgetController::class,'widgetsCategories'])->name('categories');
              Route::post('/tags',[WidgetController::class,'widgetsTags'])->name('tags');
       });
});
