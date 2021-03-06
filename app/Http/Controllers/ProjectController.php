<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreControllerRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Image;
use App\Project;
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
        $projects = Project::all()->sortByDesc('created_at');
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
    public function store(StoreControllerRequest $request)
    {
        $project = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'project_leader_id' => Auth::id(),
        ]);

        $project->users()->attach(Auth::id());

        foreach ($request->images as $image){
            Image::create([
                'file_name' => $image->store('projects'),
                'project_id' => $project->id,   
            ]);
        }

        foreach (\App\Category::all() as $categorie) {
            if ($request->has($categorie->id)){
                $project->categories()->attach($categorie->id);
            }
        }

        return redirect(route('home'));
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

        $project->categories()->detach();

        foreach (\App\Category::all() as $categorie) {
            if ($request->has($categorie->id)){
                $project->categories()->attach($categorie->id);
            }
        }

        return redirect(route('home'));
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

        $project->users()->detach();
        $project->categories()->detach();

        foreach($project->comments as $comment) {
            $comment->delete();
        }

        $project->delete();

        return redirect(route('home'));
    }

    public function join (Project $project){
        $project->users()->attach(Auth::user()->id);
        return back();
    }

    public function leave (Project $project){
        $project->users()->detach(Auth::user()->id);
        return back();
    }
}
