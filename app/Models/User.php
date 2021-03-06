<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Comment;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => 'array',
    ];

    /***
 * @param string $role
 * @return $this
 */
public function addRole(string $role)
{
    $roles = $this->getRoles();
    $roles[] = $role;
    
    $roles = array_unique($roles);
    $this->setRoles($roles);

    return $this;
}

/**
 * @param array $roles
 * @return $this
 */
public function setRoles(array $roles)
{
    $this->setAttribute('roles', $roles);
    return $this;
}

/***
 * @param $role
 * @return mixed
 */
public function hasRole($role)
{
 
    return $role === $this->role;
}

/***
 * @param $roles
 * @return mixed
 */
public function hasRoles($roles)
{
    $currentRoles = $this->getRoles();
    foreach($roles as $role) {
        if ( ! in_array($role, $currentRoles )) {
            return false;
        }
    }
    return true;
}

/**
 * @return array
 */
public function getRoles()
{
    $roles = $this->getAttribute('roles');

    if (is_null($roles)) {
        $roles = [];
    }

    return $roles;
}
public function comments()
{
    return $this->hasMany(Comment::class,'user_id','id');
}
}
