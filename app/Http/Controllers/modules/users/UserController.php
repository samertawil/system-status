<?php

namespace App\Http\Controllers\modules\users;

use App\Models\Role;
use App\Models\User;
use App\Models\status;
use App\Models\role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('usertype')->get();
        return view('apps.modules.users.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
         $user = User::findorfail($id);
        //  $data= Http::get("http://127.0.0.1:8000/api/phone/$user->full_name");
         
        //  $name=$data[0];
       $name= [];
   
 
 
        $statuses = status::select('id', 'status_name', 'p_id')->where('p_id', 30)->get();
        $roles_group = Role::get();
        $granted_groups = role_user::select('role_id')->where('user_id', $id)->get();
        return view('apps.modules.users.edit', compact('user', 'statuses', 'roles_group', 'granted_groups','name'));
    }



    public function update(Request $request, $id)
    {

        $data = User::findorfail($id);

        $data->update([
            'full_name' => $request->full_name,
            'email' => $request->email_verified_atemail,
            'email_verified_at' => $request->email_verified_at,
            'user_activation' => $request->user_activation,
            'user_type' => $request->user_type,
        ]);

        Http::post("http://127.0.0.1:8000/api/phone?name= $request->full_name&phone=$request->phone");

        if (!empty($request->role_id)) {
            foreach ($request->role_id as $roles) {

                role_user::upsert([
                    [
                        'user_id' => $id,
                        'role_id' => $roles,
                        'created_by' => Auth::id()
                    ],
                ], uniqueBy: ['user_id', 'role_id'],);
            }
        }

        if (empty($request->role_id)) {
            $data = role_user::where('user_id', $id);
            $data->forceDelete();
        } else {
            $data = role_user::wherenotin('role_id', $request->role_id);
            $data->forceDelete();
        }

        return redirect()->back()->with('message', 'user has been updated successfuly')->with('type', 'success');
    }




    public function destroy($id)
    {
        //
    }
}
