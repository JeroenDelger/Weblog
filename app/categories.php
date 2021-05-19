<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $guarded= [];

    use HasFactory;
    protected $fillable = ['id', 'title'];
    
    public function id()
    {
     return $this->belongsToMany('App/Models/Weblogblog', 'categorie_weblog', 'categorie_id', 'weblog_id');
}
}