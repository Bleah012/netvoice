@extends('layouts.app')
@section('title', 'Create Project')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Add New Project</h1>

  <form action="{{ route('projects.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Client</label>
      <select name="client_id" class="form-select" required>
        <option value="">Select Client</option>
        @foreach($clients as $client)
          <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Status</label>
      <input type="text" name="status" class="form-control">
    </div>
    <button type="submit" class="btn bg-accent-orange text-white">Create Project</button>
    <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
