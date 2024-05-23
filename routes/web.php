<?php


use App\Models\card;
use App\Models\employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebSiteController;
use App\Http\Controllers\website\PostController;
use App\Http\Controllers\website\CardsController;
use App\Http\Controllers\systems\SystemsController;
use App\Http\Controllers\website\CommentController;
use App\Http\Controllers\modules\status\StatusController;
use App\Http\Controllers\modules\status\CategoryController;

Auth::routes();



Route::post('/test1',function(Request  $request ) {
  
    employee::create($request->all());
    return back();
})->name('emp.store');



Route::get('/welcome',function (){
    return view('welcome');
});

Route::get('aljazera', function () {
    return view('html.aljazera');
});


Route::get('temp1', function () {
    return view('html.temp1');
});



Route::get('oop', function () {
    return view('oop');
});

Route::get('oop1', function () {
    return view('layouts.app');
});





//------------------------------routes for public user------------------------------
Route::controller(WebSiteController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('contact-us', 'contactUs')->name('contact-us');
    Route::get('/gallary','gallaryindex')->name('gallaryindex');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('blogs', 'blogsindex')->name('blogsindex');
    Route::get('blogscateroty/{id}', 'blogscateroty')->name('blogscateroty');
    Route::get('blogs/{id}', 'showblog')->name('showblog');
    Route::get('blogsbyuser/{id}', 'blogsbyuser')->name('blogsbyuser');
});
//---------------------------------------------------------------------------------


//------------------------------routes for admin user------------------------------

Route::get('/admin', function () {
    return view('apps.index');
})
    ->middleware('auth');


Route::prefix('admin/cards/')->middleware('auth')->name('admin.cards.')->group(function () {

    Route::resource('', CardsController::class);
});

Route::middleware('auth')->group(function () {


    Route::get('admin/cards/edit/{id}', [CardsController::class, 'edit'])->name('admin.cards.edit');

    Route::put('admin/cards/update/{id}', [CardsController::class, 'update'])->name('admin.cards.update');

    Route::delete('admin/cards/destroy/{id}', [CardsController::class, 'destroy'])->name('admin.cards.destroy');

    Route::get('admin/cards/trashed', [CardsController::class, 'Trashed'])->name('admin.cards.trashed');

    Route::delete('admin/card/ForecDelete/{id}', [CardsController::class, 'ForecDelete'])->name('admin.cards.forecdelete');

    Route::put('admin/cards/restore/{id}', [CardsController::class, 'restore'])->name('admin.cards.restore');
});


Route::prefix('admin/status/')->middleware('auth')->name('admin.status.')->group(function () {

    Route::resource('', StatusController::class);
});



Route::prefix('user/post/')->middleware('auth')->name('user.post.')->group(function () {

    Route::resource('', PostController::class);
});

Route::get('user/post/index', [PostController::class, 'index'])->name('user.post.index');
Route::get('user/post/edit/{id}', [PostController::class, 'edit'])->name('user.post.edit');
Route::put('user/post/update/{id}', [PostController::class, 'update'])->name('user.post.update');

Route::prefix('user/category')->middleware('auth')->name('user.category.')->group(function () {
    Route::resource('/', CategoryController::class);
});

Route::put('user/category/allowcategory/{id}', [CategoryController::class, 'allowcategory'])->name('user.category.allowcategory');
Route::put('user/category/rejectcategory/{id}', [CategoryController::class, 'rejectcategory'])->name('user.category.rejectcategory');


Route::controller(CommentController::class)->name('user.comment.')->group(function () {
    Route::post('user/comment/store/{id}', 'store')->name('store');
    Route::get('user/comment/edit/{id}', 'edit')->name('edit');
    Route::put('user/comment/update/{id}', 'update')->name('update');
    Route::delete('user/comment/destroy/{id}', 'destroy')->name('destroy');
});

Route::get('admin/visitor-mail',[WebSiteController::class,'visitormail']);


require __DIR__.'/users_permission.php';

require __DIR__.'/test.php';
 