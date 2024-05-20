<?php

namespace App\Models;

use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends BaseModel
{

    protected $fillable = [
        'title', 'description', 'category_id', 'post_type', 'comment_able', 'status_id', 'tags', 'slug', 'user_id',
        'post_img'
    ];

    protected $casts = [
        'post_img' => 'json',
        'tags' => 'array',

    ];

    public static function MyUploadfilesClass(Request $request , $file_column_name)
    {

  
        if (!$request->hasFile($file_column_name)) {
            return ;
        }
            $files = $request->file($file_column_name);
            $attchments_file = [];
            foreach ($files as $file) {
                if (!$file->isValid()) {
                    return;
                }
                $filename = 'post' . time() . rand(00000, 99999) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('post', $filename,'public' );
                $attchments_files[] = $path;
            }

            return  $attchments_files;
        }
  

    public function username() {
        return $this->hasOne(user::class,'id','user_id');
    }

    public function categoryname() {
        return $this->hasOne(category::class,'id','category_id');
    }

    public function statusname() {
        return $this->hasOne(status::class,'id','status_id');
    }

    public function commentstatusname() {
        return $this->hasOne(status::class,'id','comment_able');
    }

    public function posttypename() {

        return $this->hasOne(status::class,'id','post_type');

    }


    protected static function booted()
    {
      static::addGlobalScope('not-active-post', function (Builder $builder) {
  
        $builder->where('status_id','!=',23);
        
      });
    }
  
}
