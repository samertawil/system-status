<?php

use App\Http\Controllers\WebSiteController;
use App\Models\city;
use Illuminate\Support\Facades\Route;
 




Route::get('/test1',function() {
  
    return view('test1')  ;
});



  Route::get('/select2',[WebSiteController::class,'select2']);
