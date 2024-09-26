<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategorymodel extends Model
{
    use HasFactory;
    protected $table="subcategory";
    protected $primarykey="id";

    public function products(){
        return $this->hasMany('App\Models\productmodel','subcategory','subcategory');
    }
}
