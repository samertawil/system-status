<?php

namespace App\Http\Controllers\modules\roles_abilities;

use App\Models\status;
use App\Models\ability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class abilitiesController extends Controller
{

    public function index()
    {
        $abilities = ability::get();
        return view('apps.modules.abilities.index', compact('abilities'));
    }


    public function create()
    {
        $statuses = status::select('id', 'status_name', 'p_id')->get();
        return view('apps.modules.abilities.create', [
            'statuses' => $statuses,
        ]);
    }


    public function store(Request $request)
    {
       
        $request->validate(ability::valid_rules());
        ability::create( $request->all());
         
        return redirect()->back()->with('message','data is created succesfuly')->with('type','success');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
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
