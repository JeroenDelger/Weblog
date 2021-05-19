<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $guarded= [];
    /**
 * @var array
 */
protected $casts = [
    'roles' => 'array',
];
}

