<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Vinkla\Hashids\Facades\Hashids;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role)
    {
        $username = $this->username;
        return User::where('usertype', $role)->where('username',$username)->count();
    }

    public function gethashid(){
        $id = $this->id;
        return Hashids::encode($id);
    }
    
}
