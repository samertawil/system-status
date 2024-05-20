<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    public function index()
    {
      
        $visitormail=visitor::get();
        dd( $visitormail);
        return $visitormail;

    }

 
    public function store(Request $request)
    {
        $visitormail=visitor::create($request->all());

        return  response($visitormail,201 );
        
    }

  
    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
