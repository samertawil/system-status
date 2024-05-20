<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends BaseModel
{
     protected $table='role_user';

     protected $fillable=['user_id','role_id','created_by','revoked_by','revoke_at'];
   
}
