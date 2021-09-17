<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_User extends Model
{
    protected $table = 'project_user';

    protected $fillable = [
        'user_id',
        'project_id'
    ];
}
