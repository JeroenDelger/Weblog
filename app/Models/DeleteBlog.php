<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteBlog extends Model
{
    use HasFactory;
    protected $fillable = ['blog_del_id'];
}
