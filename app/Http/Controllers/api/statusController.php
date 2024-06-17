<?php

namespace App\Http\Controllers\api;

use App\Models\status;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class statusController extends Controller
{
    public $var1 = 10;

    public function getmainsystem() {

        $names=status::where('p_id',1)->get(['id','status_name','route_system_name']);
        return response( $names ,200);
    }


public function getsystemname($id) {
   
    $data=status::select('status_name','id')->find($id);
    return response($data,201);
}


    public function index()
    {


        $data = status::with('parentname:id,status_name')->get();
        $OBJ = new status();

        return  $OBJ->var1;
    }

    // public function getTypeNameAttribute() {
    //     return ucfirst($this->type);
    // }


    public function store(Request $request)
    {
        //
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

    public function t1() {
        return response('heelo samer',200);
    }
}
