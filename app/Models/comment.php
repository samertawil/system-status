<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
   protected $fillable=['full_name','user_status','user_id','email','url','ip_address','comment','status_id','post_id'];

   public static function comment_rules() {
      return [
         'comment'=>['required'],
      ];
       
   }
 
}
 

 