<?php

namespace App\Http\Controllers\modules\status;

use App\Models\User;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class StatusController extends Controller
{

    public function index()
    {


        if ( Gate::denies('status.view')) {
            abort(403);
        }
        

        status::chkabilities('status.view');

        $statuses_data = $this->GetStatusData();

        return view('apps.modules.status.index', compact('statuses_data'));
    }


    public function create()
    {
      if  (Gate::denies('status.create')) {
            abort(403);
        }

        status::chkabilities('status.create');


        $statuses_data = $this->GetStatusData();
        $parentsname_data = $this->GetStatusData1();
        return view('apps.modules.status.create', compact('statuses_data', 'parentsname_data'));
    }


    public function store(Request $request)
    {

       $d1=Http::get("http://127.0.0.1:9000/api/getpermission") ;
        foreach (Http::get("http://127.0.0.1:9000/api/getpermission")  as $data) {
       dd ($d1->id()  );
        }

        if(Gate::denies('status.create')) {
            abort(403);
        }

        status::chkabilities('status.create');

        $request->validate(status::valid_rules());



        $d1 =  status::create([
            'status_name' => $request->status_name,
            'p_id' =>  $request->p_id,
            'used_in_system' => $request->used_in_system,
            'route_name' => $request->route_name,
            'page_name' => $request->page_name,
            'description' => $request->description,
            'route_system_name' => $request->route_system_name,
            'user_id' => Auth::id(),
            // 'categories_status_id' => $cat_status_id,
            'slug' => $request->slug,

        ]);

        return redirect()->back()->with('message', 'تم الحفظ بنجاح')->with('type', 'success');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if(Gate::denies('status.update')) {
            abort(403);
        }
    }


    public function update(Request $request, $id)
    {
        if(Gate::denies('status.update')) {
            abort(403);
        }
    }


    public function destroy($id)
    {
       
    }

    public function GetStatusData()
    {
        $data = status::get();
        return $data;
    }

    public function GetStatusData1()
    {

        $data1 =  DB::select('select * from statuses where p_id is null ');
        return $data1;
    }
}
