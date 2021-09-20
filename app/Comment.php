<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'content',
    ];

    public function project () {
        return $this->belongsTo(Project::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
