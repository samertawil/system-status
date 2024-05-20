<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class status extends BaseModel
{
   protected $fillable = ['status_name', 'p_id', 'used_in_system', 'description', 'route_name', 'page_name', '	p_id_sub', 'route_system_name', 'user_id', 'categories_status_id', 'slug'];


   public static function valid_rules()
   {
      return [
         'status_name' => ['required', 'min:1',],
         'p_id'        => ['nullable', 'exists:statuses,id'],
         'route_system_name'  => ['required_with:route_name'],
         'route_system_name' => ['required_if:p_id,==,1'] , 
      ];
   }

   public function parentname()
   {
      return $this->hasOne(status::class, 'id', 'p_id');
   }


   public static function chkabilities($abilitename)
   {
      if (Gate::denies($abilitename)) {
         abort(403);
      }
   }

   public $var1 = 'samer';
}
