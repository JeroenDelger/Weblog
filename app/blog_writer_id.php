<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class writer_id extends Model
{
    public function user()
    {
       return $this->belongsTo(User::class);       
    }
}
