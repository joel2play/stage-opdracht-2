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

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function project_leader() {
        return User::find($this->project_leader_id);
    }
}
