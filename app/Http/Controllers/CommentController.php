<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Project;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store (StoreCommentRequest $request, Project $project) {
        Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'project_id' => $project->id
        ]);

        return back();
    }
}
