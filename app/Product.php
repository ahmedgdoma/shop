<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category_id', 'store_id'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function store(){
        return $this->belongsTo('App\Store');
    }
    public function sizes(){
        return $this->hasMany('App\Size');
    }
}
