<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\post;
use App\Models\status;
use App\Models\comment;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebSiteController extends Controller
{
    public function index()
    {
        $all_cards_data = card::with(['username']);
        $cards_data=$all_cards_data->where('status_id',45)->orderBy('created_at', 'desc')->take(5)->get();
        $gallaries_data=card::select('card_title','card_text','card_img')->where('status_id',46)->wherenotnull('card_img')->orderBy('created_at', 'desc')->get();
      
        return view('web-site-public.index', compact('cards_data','gallaries_data'));
    }

    public function contactUs()
    {

        return view('web-site-public.contact-us');
    }

    public function show($id)
    {
        $data = card::where('active', '1')->with(['username'])->findorfail($id);
           
           
        return  view('web-site-public.show', compact('data'));
    }


    public function blogsindex()
    {

        if (DB::table('posts')->where('id', '>=', 1)->exists()) {

            $lastid = post::with(['categoryname', 'username'])->wherehas('categoryname', function ($query) {
                $query->where('status_id', 35);
            })->latest()->first()->id;


            $postsdata = post::with(['username', 'categoryname'])->wherehas('categoryname', function ($query) {
                $query->where('status_id', 35);
            })->orderby('created_at', 'desc')->where('id', '!=', $lastid)->get();


            $lastpostsdata = post::with(['username', 'categoryname'])->wherehas('categoryname', function ($query) {
                $query->where('status_id', 35);
            })->where('id', $lastid)->get();



            $categories = category::categoriescount();

            $categoriescount = post::with(['categoryname', 'username'])->wherehas('categoryname', function ($query) {
                $query->where('status_id', 35);
            })->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))->get();
        } else {
            $postsdata = [];
            $lastpostsdata = [];
            $categories = [];
        }



        return view('web-site-public.blogsindex', compact('postsdata', 'lastpostsdata', 'categories', 'categoriescount'));
    }

    public function blogscateroty($id)
    {

        $postsdata = post::where('category_id', $id)->with(['username', 'categoryname'])->orderBy('created_at', 'desc')->get();

        $data = category::findorfail($id);

        $categories = category::categoriescount();

        $categoriescount = post::with(['categoryname', 'username'])->wherehas('categoryname', function ($query) {
            $query->where('status_id', 35);
        })->groupBy('category_id')
            ->select('category_id', DB::raw('count(*) as total'))->get();

        return view('web-site-public.blogscateroty', compact('postsdata', 'categories', 'data', 'categoriescount'));
    }

    public function showblog($id)
    {

        $data = post::findorfail($id);
        $comments=comment::select('comment','id','full_name')->where('post_id',$id)->orderby('id','desc')->get();
 
        return view('web-site-public.showblog', compact('data','comments'));
    }

    public function blogsbyuser($id)
    {
        $postsdata = post::with(['username', 'categoryname'])->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $categories = category::categoriescount();
        
        return view('web-site-public.blogsbyuser', compact('postsdata', 'categories'));
        return $id;
    }

    public function gallaryindex() {
        $gallaries_data=card::select('card_title','card_text','card_img','id')->where('status_id',46)->wherenotnull('card_img')->orderBy('created_at', 'desc')->get();
          return view('web-site-public.gallaryindex',compact('gallaries_data'));
    }


    public function visitormail() {
        return view('apps.web-site-manage.visitor-mail.index');
    }
}
