<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class writer_id extends Model

{
    use HasFactory;    
    public function blog()
    {
        return $this->belongsTo('App\Weblogblog');
    }
    public function user()
    {
        return $this->belongsTo('App\blog_writer_id', 'writer_id');

    }
}
