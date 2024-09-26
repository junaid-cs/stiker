<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartmodel extends Model
{
    use HasFactory;
    protected $table="cart";
    protected $primarykey="id";

    public function products(){
        return $this->belongsTo('App\Models\productmodel','product_id','id');
    }
}
