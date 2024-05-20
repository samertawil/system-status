<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getdata($id)
    {
        $query = post::where('user_id',$id)->with(['username', 'categoryname', 'statusname', 'commentstatusname', 'posttypename'])->withoutGlobalScope('not-active-post');
            
        
        return datatables($query)->make(true);
    }
}
