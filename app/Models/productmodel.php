<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productmodel extends Model
{
    use HasFactory;
    protected $table="products";
    protected $primarykey="id";
    
    public function relatedproducts(){
        return $this->hasMany('App\Models\productmodel','category','category');
    }
    public function rating(){
        return $this->hasOne('App\Models\ratingmodel','product_id','id')->orderBy('id', 'desc');
    }
}
