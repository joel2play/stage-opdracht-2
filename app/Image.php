<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'file_name',
        'project_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
