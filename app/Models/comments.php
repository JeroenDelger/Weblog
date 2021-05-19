<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;    
    public function blog()
    {
        return $this->belongsTo('App\Weblogblog');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');

    }
}
