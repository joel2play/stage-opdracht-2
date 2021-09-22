<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name'
    ];

    const ADMIN = 1;
    const USER = 2;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
