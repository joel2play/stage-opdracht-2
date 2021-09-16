<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'project_leader_id',
    ];

    public function images () {
        return $this->hasMany(Image::class);
    }
}
