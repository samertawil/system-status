<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends BaseModel
{

  protected $table = 'categories';

  protected $fillable = ['category_name', 'status_id','user_id','parent_id'];


  protected static function booted()
  {
    static::addGlobalScope('category', function (Builder $builder) {

      $builder->wherenotin('status_id', [37]);
      
    });
  }

   

  public function username()
  {
    return $this->hasone(user::class, 'id', 'user_id');
  }

  public function statusname()
  {
    return $this->hasone(status::class, 'id', 'status_id');
  }

  public static function categoryRules($request) {
    return [
      'category_name'=>['unique:categories,category_name'],
    ];
  }

  public static function categoriescount() {
    $categories = category::select('id', 'category_name')->where('status_id', 35)
    ->get();

    return $categories;
  }
}
