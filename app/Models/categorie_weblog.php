<?php

namespace App\Models;

use App\Models\Categories;
Use App\Models\Weblogblog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie_Weblog extends Model
{
    use HasFactory;
      protected $fillable = ['categorie_id', 'weblog_id',];
    protected $guarded= [];
    public function id()
    {
        $blog_id = Weblogblog::get('id');
        $categorie_id = Categories::get('id');
        dd($blog_id, $categorie_id);
    }
}