<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
   protected $fillable = ['granted_to_type', 'name', 'abilities','created_by'];

   protected $casts = [
      "abilities" => 'array',
   ];

   public function usersRelation()
   {
      return $this->belongsToMany(user::class, 'role_user');
   }

   public static function validate_rule()
   {
      return [
         "name" => ['required', 'string',],
         "abilities" => ['required'],
      ];
   }
}
// 'unique:roles,name'