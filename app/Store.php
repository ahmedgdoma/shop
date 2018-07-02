<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['area'];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }
}
