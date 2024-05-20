<?php

use App\Http\Controllers\status\StatusController;
use App\Http\Controllers\systems\SystemsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 

 

Route::get('index',function() {
    return view('html.index');
});