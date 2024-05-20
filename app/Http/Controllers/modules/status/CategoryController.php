<?php

namespace App\Http\Controllers\modules\status;

use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = category::withoutglobalscope('category')->where('status_id', 36)->get();
        return view('apps.modules.status.category', compact('categories'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate(category::categoryRules($request));

        $cat_status_id = 36;

        $usertype = User::wherekey(Auth::id())->pluck('user_type');
        if ($usertype[0]  == 31) {
            $cat_status_id = 35;
        } else {
            $cat_status_id = 36;
        }


        category::create([
            'category_name' => $request->category_name,
            'status_id' =>  $cat_status_id,
            'user_id' => Auth::id(),
            'parent_id' => 10,
        ]);

        if ($cat_status_id == 36) {
            return redirect()->back()->with('message', 'saved untile admin accept')->with('type', 'warning');
        }
        return redirect()->back()->with('message', 'saved')->with('type', 'success');
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
    }


    public function destroy($id)
    {
        //
    }


    public function allowcategory(Request $request, $id)
    {

        $data = category::withoutglobalscope('category')->findOrfail($id);

        $data->update([
            'status_id' => 35,
        ]);

        return redirect()->back()->with('message', 'category is allowed')->with('type', 'success');
    }

    public function rejectcategory(Request $request, $id)
    {

        $data = category::withoutglobalscope('category')->findOrfail($id);

        $data->update([
            'status_id' => 37,
        ]);

        return redirect()->back()->with('message', 'category is rejected')->with('type', 'success');
    }
}
