@extends('layouts.app')
@section('title', 'Edit Project')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Edit Project</h1>

  <form action="{{ route('projects.update', $project->id) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Client</label>
      <select name="client_id" class="form-select" required>
        @foreach($clients as $client)
          <option value="{{ $client->id }}" {{ $project->client_id == $client->id ? 'selected' : '' }}>
            {{ $client->name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Status</label>
      <input type="text" name="status" class="form-control" value="{{ old('status', $project->status) }}">
    </div>
    <button type="submit" class="btn bg-accent-orange text-white">Update Project</button>
    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
