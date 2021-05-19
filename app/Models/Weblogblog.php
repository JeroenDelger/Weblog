<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weblogblog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'comment', 'blog', 'premium', 'photoname', 'writer_id', 'foto_comment',];

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'blog_id');
    }

    public function writer_id()
    {
        return $this->hasMany('App\blog_writer_id', 'writer_id');
    }

    public function categoriesid()
    {
        return $this->belongsToMany('App\Models\Categories', 'categorie_weblog', 'weblog_id', 'categorie_id');
    }
}

class Post extends Model
{
    protected $fillable = ['name', 'category', 'description'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'blog_id');
    }
}

class CategoryId extends Model
{
    public function CategoryId()
    {
        return $this->hasMany('App\categories', 'id');
    }
}
