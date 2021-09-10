<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage project');

        return view('projects.create', [
            'clients' => Client::latest('id')->get(),
            'users' => User::latest('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('manage project');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'client' => 'required',
            'user' => 'required'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'client_id' => $request->client,
            'user_id' => $request->user,
        ]);

        $projectTitle = $project->title;

        return redirect()
                ->route('projects.index')
                ->with('message', "Project ${projectTitle} has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Project $project)
    {
        $this->authorize('manage project');

        return view('projects.edit', [
            'project' => $project,
            'clients' => Client::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('manage project');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'client' => 'required',
            'user' => 'required'
        ]);

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'client_id' => $request->client,
            'user_id' => $request->user,
        ]);

        $projectTitle = $project->title;

        return redirect()
            ->route('projects.index')
            ->with('message', "Project ${projectTitle} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Project $project)
    {
        $this->authorize('manage project');

        $projectTitle = $project->title;

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('message', "Project ${projectTitle} has been deleted");
    }
}
