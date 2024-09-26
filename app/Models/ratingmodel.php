<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratingmodel extends Model
{
    use HasFactory;
    protected $table="rating";
    protected $fillable=[
          'user_id',
          'product_id',
          'rating',
          'review',
          'status',

    ];

    public function users(){
      return $this->belongsTo('App\Models\User','user_id','id');
  }
        
    
    }
