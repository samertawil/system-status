<?php

namespace App\Http\Controllers\website;

use App\Models\card;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class CardsController extends Controller
{


    public function index()
    {   
        $cards_data = card::with(['username','statusname'])->get();
         
        return view('apps.web-site-manage.cards.index', compact('cards_data'));
    }


    public function create()
    {
 
        return  view('apps.web-site-manage.cards.create');
    }


    public function store(Request $request)

    {
    

        $request->validate(card::valid_rules(), card::valid_message());

        $path = card::upload_file($request);

        card::create([
            'card_title' => $request->card_title,
            'card_text'  => $request->card_text,
            'card_img'   => $path,
            'active'     => $request->active,
            'user_id'    => Auth::user()->id,
            'status_id'  => $request->status_id,

        ]);
        return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('type', 'success');
    }


    public function show($id)
    {
        return $id;
    }


    public function edit($id)
    {

        $data = card::findorfail($id);

        return  view('apps.web-site-manage.cards.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {

        // $var1->attchments ? array_merge($var1->attchments ,$this->uploads_file($request)) : $att_var=$this->uploads_file($request);
        $request->validate(card::valid_rules());

        $files = card::upload_file($request);
        $data = card::findorfail($id);

        if ($data->card_img && $files) {
            $attchment_files = array_merge($data->card_img, $files);
        } else {
            $attchment_files = $files;
        }


        $data->update([
            'card_title' => $request->card_title,
            'card_text' => $request->card_text,
            'active' => $request->active,
            'status_id'=>$request->status_id,
            'card_img' => $files ?  $attchment_files : $data->card_img,
        ]);

        return redirect()->back()->with('message', 'تم التعديل بنجاح')->with('type', 'success');
    }


    public function destroy($id)
    {
        $data = card::findorfail($id)->delete();
        card::destroy($id);

        return redirect()->back()->with('message', 'record was deleted !')->with('type', 'warning');
    }

    public function Trashed()
    {
        $trash_data = card::onlyTrashed()->get();
        return view('apps.web-site-manage.cards.trashed', compact('trash_data'));
    }

    public function ForecDelete($id)
    {

        $data = card::onlyTrashed()->find($id);
        $data->forceDelete();
        $data->card_img ? storage::disk('public')->delete($data->card_img) : null;
        return redirect()->back()->with('message', 'the file is completly deleted!')->with('type', 'warning');
    }

    public function restore($id) {

        card::onlyTrashed()->find($id)->restore();
        return redirect(route('admin.cards.index'))->with('message','the file is restored')->with('type','success');
    }
}
