<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\modules\users\UserController;
use App\Http\Controllers\modules\roles_abilities\RolesController;
use App\Http\Controllers\modules\roles_abilities\abilitiesController;



Route::prefix('admin/roles/')->middleware('auth')->name('admin.roles.')->group(function () {

    Route::resource('', RolesController::class);
});

Route::get('admin/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
Route::put('admin/roles/update/{id}', [RolesController::class, 'update'])->name('admin.roles.update');
Route::delete('admin/roles/destroy/{id}', [RolesController::class, 'destroy'])->name('admin.roles.destroy');
Route::delete('admin/roles/ForecDelete/{id}',[RolesController::class,'ForecDelete'])->name('admin.roles.ForecDelete');
Route::put('admin/roles/restore/{id}',[RolesController::class,'restore'])->name('admin.roles.restore');
Route::get('admin/roles/index/{deletedFile}',[RolesController::class,'index'])->name('admin.roles.index');


Route::prefix('admin/abilities/')->middleware('auth')->name('admin.abilities.')->group(function () {

    Route::resource('', abilitiesController::class);
});


// ----------------USER ROUTS--------------------


Route::prefix('admin/users/')->middleware('auth')->name('admin.users.')->group( function() {
    Route::resource('',UserController::class);
});

Route::get('admin/users/edit/{id}',[UserController::class,'edit'])->name('admin.users.edit');
Route::put('admin/users/update/{id}',[UserController::class,'update'])->name('admin.users.update');
Route::put('admin/users/update2/{user_id}',[UserController::class,'update2'])->name('admin.users.update2');

// ---------------END USER ROUTS---------------------

 