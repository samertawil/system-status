<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ability extends BaseModel
{

    protected $fillable=['ability_name','ability_description','url',	'activation','status_id','module_id','description' ];

    public function modulename() {
        return $this->hasOne(status::class,'id','module_id');
    }

    public static function valid_rules() {
        return [
            "ability_name" => ['required','string'],
            "ability_description" => ['required','string'],
            "activation" => ['required', 'in:"active","not active"'],
            "module_id" =>['required','exists:statuses,id']

        ];
    }

    
   protected  static function booted() {
    static::addGlobalScope('not-active',function ($query) {
        return $query->where('activation','<>', "not active" );
    });
   }
    		
}
