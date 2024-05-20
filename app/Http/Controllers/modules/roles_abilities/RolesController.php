<?php

namespace App\Http\Controllers\modules\roles_abilities;

use App\Models\Role;
use App\Models\ability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{

    public function index($deletedFile)
    {

        if ($deletedFile == 1) {
            return view('apps.modules.roles.index', [
                "roles" => Role::withCount('usersRelation')->onlyTrashed()->get(),
            ]);
        }
        return view('apps.modules.roles.index', [
            "roles" => Role::withCount('usersRelation')->get(),
        ]);
    }


    public function create()
    {
        $roles = new role;
        $abilities = ability::select('id', 'module_id', 'ability_description', 'ability_name', 'activation')->with('modulename')->withoutGlobalScope('not-active')->get();
        $abilities_module = ability::select('module_id')->groupby('module_id')->get();

        return view('apps.modules.roles.create', compact('abilities', 'abilities_module', 'roles'));
    }


    public function store(Request $request)
    {

        $request->validate(role::validate_rule());


        foreach ($request->abilities as $key => $data) {


            $x1 = ability::select('id')->where('ability_name', $data)->first();
            if (empty($x1)) {
                return redirect()->back()->with('message', 'error , bad value enter')->with('type', 'danger');
            }
        }
        Role::create([
            'name' => $request->name,
            'abilities' => $request->abilities,
        ]);

        return redirect()->back()->with('message', 'group is created successfly')->with('type', 'success');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $roles = role::findorfail($id);
        $abilities_module = ability::select('module_id')->groupby('module_id')->get();
        $abilities = ability::select('id', 'module_id', 'ability_description', 'ability_name', 'activation')->with('modulename')->withoutGlobalScope('not-active')->get();
        return view('apps.modules.roles.edit', compact('abilities_module', 'abilities', 'roles'));
    }


    public function update(Request $request, $id)
    {

        $UpdatedData = role::findorfail($id);


        $request->validate(role::validate_rule());


        foreach ($request->abilities as $key => $data) {


            $x1 = ability::select('id')->where('ability_name', $data)->first();
            if (empty($x1)) {
                return redirect()->back()->with('message', 'error , bad value enter')->with('type', 'danger');
            }
        }

        $UpdatedData->update($request->all());
        return redirect()->back()->with('message', 'group is updated successfly')->with('type', 'success');
    }


    public function destroy($id)
    {
        role::destroy($id);
        return redirect()->back()->with('message', 'group is deleted successfly')->with('type', 'success');
    }



    public function ForecDelete($id)
    {

        $data = role::onlyTrashed()->find($id);
        $data->forceDelete();
        return redirect()->back()->with('message', 'the file is completly deleted!')->with('type', 'warning');
    }

    public function restore($id)
    {
        role::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('message', 'the file is restored')->with('type', 'success');
    }
}
