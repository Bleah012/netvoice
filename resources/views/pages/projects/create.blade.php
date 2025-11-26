@extends('layouts.app')
@section('title', 'Create Project')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Add New Project</h1>

  <form action="{{ route('projects.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
      @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label fw-bold">Slug</label>
      <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" readonly>
      @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="client_id" class="form-label fw-bold">Client</label>
      <select id="client_id" name="client_id" class="form-select" required>
        <option value="">Select Client</option>
        @foreach($clients as $client)
          <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>
            {{ $client->name }}
          </option>
        @endforeach
      </select>
      @error('client_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label for="status" class="form-label fw-bold">Status</label>
      <select id="status" name="status" class="form-select" required>
        @foreach(['planned','active','paused','completed'] as $status)
          <option value="{{ $status }}" @selected(old('status') == $status)>
            {{ ucfirst($status) }}
          </option>
        @endforeach
      </select>
      @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
      <button type="submit" class="btn bg-accent-orange text-white">Create Project</button>
      <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
  </form>
</div>

{{-- Live Slug Preview --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const nameInput = document.getElementById('name');
  const slugInput = document.getElementById('slug');

  nameInput.addEventListener('input', function () {
    const slug = nameInput.value
      .toLowerCase()
      .trim()
      .replace(/\s+/g, '-')        // Replace spaces with hyphens
      .replace(/[^a-z0-9\-]/g, '') // Remove non-alphanumeric
      .replace(/\-+/g, '-');       // Collapse multiple hyphens

    slugInput.value = slug;
  });
});
</script>
@endsection
