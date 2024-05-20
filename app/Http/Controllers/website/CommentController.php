<?php

namespace App\Http\Controllers\website;

use App\Models\post;
use App\Models\User;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request, $id)
    {
        $request->validate(comment::comment_rules());

        $allowcomment = post::select('comment_able')->where('comment_able',20)->findorfail($id);


        $userdata = User::select('full_name')->wherekey(Auth::id())->get();

        comment::create([
            'full_name' => Auth::check() ? $userdata[0]->full_name : null,
            'user_id' => Auth::id(),
            // 'email'
            'comment' => $request->comment,
            'status_id' => 42,
            'post_id' => $id,
        ]);

        return redirect()->back()->with('message','comment is sent')->with('type','success');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
       
        $data=comment::findorfail($id);
        $request->validate(comment::comment_rules());
        $data->update([
         'comment'=>$request->comment,
 
        ]);
      return redirect()->back()->with('message','post UPDATED succesfuly')->with('type','success');
    }


    public function destroy($id)
    {
       comment::destroy($id);
       return redirect()->back()->with('message','post DELETED succesfuly')->with('type','success');
    }
}
