<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordermodel extends Model
{
    use HasFactory;
    protected $table="ordertable";
    protected $primarykey="id";

    public function customer(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
