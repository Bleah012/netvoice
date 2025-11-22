<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->orderBy('created_at','desc')->paginate(20);
        return view('pages.projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('pages.projects.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => ['required','integer','exists:clients,id'],
            'name' => ['required','string','max:150'],
            'slug' => ['required','string','max:160','unique:projects,slug'],
            'status' => ['required','in:planned,active,paused,completed'],
            'started_at' => ['nullable','date'],
            'completed_at' => ['nullable','date','after_or_equal:started_at'],
        ]);

        $project = Project::create($data);

        return redirect()->route('projects.show', $project)->with('status', 'Project created.');
    }

    public function show(Project $project)
    {
        $project->load('client','media');
        return view('pages.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
        return view('pages.projects.edit', compact('project','clients'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'client_id' => ['required','integer','exists:clients,id'],
            'name' => ['required','string','max:150'],
            'slug' => ['required','string','max:160', Rule::unique('projects','slug')->ignore($project->id)],
            'status' => ['required','in:planned,active,paused,completed'],
            'started_at' => ['nullable','date'],
            'completed_at' => ['nullable','date','after_or_equal:started_at'],
        ]);

        $project->update($data);

        return redirect()->route('projects.show', $project)->with('status', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'Project deleted.');
    }
}
