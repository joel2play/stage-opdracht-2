<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUploadRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Image;
use App\Project;
use App\Project_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'images' => 'required',
            'images.*' => 'image',
        ]);
        $validated['project_leader_id'] = Auth::user()->id;

        $project = Project::create($validated);

        foreach ($request->images as $image){
            Image::create([
                'file_name' => $image->store('projects'),
                'project_id' => $project->id,   
            ]);
        }
        return redirect(route('project.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->name = $request->input('name');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->description = $request->input('description');

        $project->save();

        return redirect(route('project.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        foreach ($project->images as $image){
            Storage::delete($image->file_name);
            $image->delete();
        }
        $project->delete();

        return redirect(route('projects.index'));
    }

    public function join (Project $project){
        Project_User::create([
            'user_id' => Auth::user()->id,
            'project_id' => $project->id
        ]);
    }
}
