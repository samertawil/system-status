<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class card extends BaseModel
{


   protected $fillable = ['card_title', 'card_text', 'card_img', 'active', 'user_id','status_id'];

   protected $casts = [
      'card_img' => 'json',
      
      ];

   public static function upload_file(Request $request)
   {
      if (!$request->hasfile('card_img')) {

         return;
      }
   
      $files = $request->file('card_img');
      $attchments_file = [];
      foreach ($files as $file) {
         if ($file->isValid()) {
            $ex = $file->getClientOriginalExtension();
            $filename = 'websiteaddress_' . time() . '_' . rand(00000, 99999) . '.' . $ex;
            $path = $file->storeAs('/', $filename, 'public');
            $attchments_file[] =  $path;
         }
      }


      //  $date['card_img'] =  $attchments_file;

      return   $attchments_file;
   }



   public static function valid_rules()
   {
      return [
         'card_title' => 'required|string|min:3|max:40',
         'card_text' => 'required|string|min:3|max:100',
         'active' => 'required|in:0,1',
         'status_id' => [
            'nullable', 'int', 'exists:statuses,id',
         ],
         'card_img' => [
            'nullable',
         ],
      ];
   }

   public static function valid_message()
   {
      return [
         'card_text.required' => 'please add field :attribute',
      ];
   }

   protected static function booted() {
      static::addGlobalScope('active-cards',function(Builder $builder) {
         $builder->where('active','=','1');
         
      });

   }

   public function statusname() {
      return $this->hasOne(status::class,'id','status_id');
   }

   
   public function username()
   {
      return $this->hasOne(user::class, 'id', 'user_id');
   }


   public function getCardtitleAttribute($value) {

      return Str::upper($value);

   }

   public function getUseridAttribute($value) {
 
      $data = user::select('full_name')->where('id',$value)->first();
       
       return  ( $data['full_name']);
     
   }


}


