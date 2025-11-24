@extends('layouts.app')
@section('title', 'Projects')

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary-blue">Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn bg-accent-orange text-white">Add Project</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Client</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($projects as $project)
            <tr>
              <td><a href="{{ route('projects.show', $project->id) }}" class="fw-semibold">{{ $project->name }}</a></td>
              <td>{{ $project->client->name ?? 'N/A' }}</td>
              <td>{{ ucfirst($project->status ?? 'pending') }}</td>
              <td class="text-end">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center text-muted py-4">No projects found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">{{ $projects->links() }}</div>
</div>
@endsection
