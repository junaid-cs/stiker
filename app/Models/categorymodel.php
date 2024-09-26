<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorymodel extends Model
{
    use HasFactory;
    protected $table="category";
    protected $primarykey="id";

    public function subcategories(){
        return $this->hasMany('App\Models\subcategorymodel','category','name');
    }

    public function products(){
        return $this->hasMany('App\Models\productmodel','category','name');
    }
}
