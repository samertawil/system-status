<?php

use App\Models\city;
use Illuminate\Support\Facades\Route;
 




Route::get('/test1',function() {
  
    return view('test1')  ;
});


Route::get('/select2',function() {
    $cities=city::get();
    return view('select2',['cities'=>$cities]);
});

