<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_submodel extends Model
{
    use HasFactory;
    protected $table="order_subs";
    protected $fillable = [
        'user_id', 'order_id', 'product_id', 'price', 'qty', 'total', 'status',
    ];

    public function products(){
        return $this->belongsTo('App\Models\productmodel','product_id','id');
    }
}
