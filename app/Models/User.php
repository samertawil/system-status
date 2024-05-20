<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    'user_name',
    'full_name',
    'user_activation',
    'user_id',
    'status_id',
    'email',
    'email_verified_at',
    'password',
    'user_type',
    'phone',
  ];


  protected $hidden = [
    'password',
    'remember_token',
  ];


  protected $casts = [
    'email_verified_at' => 'datetime',
  ];



  protected static function booted()
  {
    static::addGlobalScope('useractivation', function ($query) {

      $query->where('user_activation', '1');
    });
  }


  public function rolesRelation()
  {
    return $this->belongsToMany(role::class, 'role_user');
  }

  public function usertype()
  {
    return $this->hasOne(status::class, 'id', 'user_type');
  }
}
