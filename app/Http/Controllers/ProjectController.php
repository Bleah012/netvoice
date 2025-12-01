<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a filtered listing of projects.
     */
    public function index(Request $request)
    {
        $categories = ['All', 'Banking', 'Education', 'Manufacturing', 'NGO', 'Commercial'];
        $activeCategory = $request->query('category', 'All');

        $projects = Project::with('client')
            ->when($activeCategory !== 'All', fn($q) => $q->where('category', $activeCategory))
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('pages.projects.index', compact('projects', 'categories', 'activeCategory'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('pages.projects.create', compact('clients'));
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id'    => ['required', 'integer', 'exists:clients,id'],
            'name'         => ['required', 'string', 'max:150'],
            'slug'         => ['required', 'string', 'max:160', 'unique:projects,slug'],
            'status'       => ['required', 'in:planned,active,paused,completed'],
            'category'     => ['required', 'string', 'max:50'],
            'tags'         => ['nullable', 'array'],
            'tags.*'       => ['string', 'max:50'],
            'started_at'   => ['nullable', 'date'],
            'completed_at' => ['nullable', 'date', 'after_or_equal:started_at'],
            'description'  => ['nullable', 'string', 'max:1000'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = $path;
        }

        // ✅ No need to json_encode, Eloquent will cast automatically
        $data['tags'] = $data['tags'] ?? [];

        $project = Project::create($data);

        return redirect()->route('projects.show', $project)
            ->with('status', 'Project created.');
    }

    /**
     * Display a single project.
     */
    public function show(Project $project)
    {
        $project->load('client'); // ✅ only load client
        return view('pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing a project.
     */
    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
        return view('pages.projects.edit', compact('project', 'clients'));
    }

    /**
     * Update a project.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'client_id'    => ['required', 'integer', 'exists:clients,id'],
            'name'         => ['required', 'string', 'max:150'],
            'slug'         => ['required', 'string', 'max:160', Rule::unique('projects', 'slug')->ignore($project->id)],
            'status'       => ['required', 'in:planned,active,paused,completed'],
            'category'     => ['required', 'string', 'max:50'],
            'tags'         => ['nullable', 'array'],
            'tags.*'       => ['string', 'max:50'],
            'started_at'   => ['nullable', 'date'],
            'completed_at' => ['nullable', 'date', 'after_or_equal:started_at'],
            'description'  => ['nullable', 'string', 'max:1000'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = $path;
        }

        // ✅ No need to json_encode
        $data['tags'] = $data['tags'] ?? [];

        $project->update($data);

        return redirect()->route('projects.show', $project)
            ->with('status', 'Project updated.');
    }

    /**
     * Delete a project.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('status', 'Project deleted.');
    }
}
