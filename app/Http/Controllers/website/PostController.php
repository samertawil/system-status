<?php

namespace App\Http\Controllers\website;

use datatables;
use App\Models\post;
use App\Models\status;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function index()
    {

        // $query = post::with(['username', 'categoryname', 'statusname', 'commentstatusname', 'posttypename'])->withoutGlobalScope('not-active-post')->get();

        return view('apps.web-site-manage.posts.index');
        // return datatables($query)->make(true);
    }



    public function create()
    {
        $Postsdata = status::select('id', 'status_name', 'p_id')->get();
        $categories = category::select('id', 'category_name', 'status_id')->get();

        return  view('apps.web-site-manage.posts.create', compact('Postsdata', 'categories'));
    }


    public function store(Request $request)
    {


        $files = post::MyUploadfilesClass($request, 'post_img');

        post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'post_type' => $request->post_type,
            'comment_able' => $request->comment_able,
            'status_id' => $request->status_id,
            'tags' => $request->tags,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
            'post_img' => $files,


        ]);

        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('type', 'success');
    }

    public function show($id)
    {
    }


    public function edit($id)
    {
        $post = post::withoutglobalscope('not-active-post')->findorfail($id);
        $Poststypedata = status::select('id', 'status_name', 'p_id')->get();
        $categories = category::select('id', 'category_name', 'status_id')->get();

        return view('apps.web-site-manage.posts.edit', compact('post', 'Poststypedata', 'categories'));
    }


    public function update(Request $request, $id)
    {

        $data = post::withoutglobalscope('not-active-post')->findorfail($id);

        $files = post::MyUploadfilesClass($request, 'post_img');

        if ($data->post_img && $files) {
            $attchment_files = array_merge($data->post_img, $files);
        } else {
            $attchment_files = $files;
        }


        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'post_type' => $request->post_type,
            'comment_able' => $request->comment_able,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
            'tags' => $request->tags,
            'post_img' =>  $files ?  $attchment_files : $data->post_img,
        ]);

        return redirect()->back()->with('message', 'تم التعديل بنجاح')->with('type', 'success');
    }


    public function destroy($id)
    {
        //
    }
}
