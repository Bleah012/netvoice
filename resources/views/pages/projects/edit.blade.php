@extends('layouts.app')
@section('title', 'Edit Project')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Edit Project</h1>

  <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow-sm">
    @csrf
    @method('PUT')

    {{-- Project Name --}}
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Project Name</label>
      <input type="text" id="name" name="name" class="form-control" 
             value="{{ old('name', $project->name) }}" required>
      @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Slug (auto-generated) --}}
    <div class="mb-3">
      <label for="slug" class="form-label fw-bold">Slug</label>
      <input type="text" id="slug" name="slug" class="form-control" 
             value="{{ old('slug', $project->slug) }}" readonly>
      @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Client --}}
    <div class="mb-3">
      <label for="client_id" class="form-label fw-bold">Client</label>
      <select id="client_id" name="client_id" class="form-select" required>
        <option value="">Select Client</option>
        @foreach($clients as $client)
          <option value="{{ $client->id }}" 
                  @selected(old('client_id', $project->client_id) == $client->id)>
            {{ $client->name }}
          </option>
        @endforeach
      </select>
      @error('client_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Status --}}
    <div class="mb-3">
      <label for="status" class="form-label fw-bold">Status</label>
      <select id="status" name="status" class="form-select" required>
        @foreach(['planned','active','paused','completed'] as $status)
          <option value="{{ $status }}" 
                  @selected(old('status', $project->status) == $status)>
            {{ ucfirst($status) }}
          </option>
        @endforeach
      </select>
      @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Category --}}
    <div class="mb-3">
      <label for="category" class="form-label fw-bold">Category</label>
      <select id="category" name="category" class="form-select" required>
        @foreach(['Banking','Education','Manufacturing','NGO','Commercial'] as $cat)
          <option value="{{ $cat }}" @selected(old('category', $project->category) == $cat)>{{ $cat }}</option>
        @endforeach
      </select>
      @error('category') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Tags --}}
    <div class="mb-3">
      <label for="tags" class="form-label fw-bold">Tags</label>
      <input type="text" id="tags" name="tags[]" class="form-control" 
             placeholder="Enter tags separated by commas" 
             value="{{ old('tags', $project->tags ? implode(',', (array) $project->tags) : '') }}">
      <small class="text-muted">Example: Networking, Cisco, Solar</small>
      @error('tags') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Dates --}}
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="started_at" class="form-label fw-bold">Start Date</label>
        <input type="date" id="started_at" name="started_at" class="form-control" 
               value="{{ old('started_at', optional($project->started_at)->format('Y-m-d')) }}">
        @error('started_at') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="completed_at" class="form-label fw-bold">Completion Date</label>
        <input type="date" id="completed_at" name="completed_at" class="form-control" 
               value="{{ old('completed_at', optional($project->completed_at)->format('Y-m-d')) }}">
        @error('completed_at') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
    </div>

    {{-- Description --}}
    <div class="mb-3">
      <label for="description" class="form-label fw-bold">Description</label>
      <textarea id="description" name="description" rows="4" class="form-control" 
                placeholder="Describe the project...">{{ old('description', $project->description) }}</textarea>
      @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Image Upload (optional) --}}
    <div class="mb-3">
      <label for="image" class="form-label fw-bold">Project Image</label>
      <input type="file" id="image" name="image" class="form-control">
      @error('image') <div class="text-danger small">{{ $message }}</div> @enderror

      @php $img = $project->imageUrl(); @endphp
      @if($img)
        <div class="mt-2">
          <p class="text-muted small">Current Image:</p>
          <img src="{{ $img }}" 
               alt="{{ $project->name }}" 
               class="img-fluid rounded shadow-sm" 
               style="max-height:200px;object-fit:cover;">
        </div>
      @endif
    </div>

    {{-- Actions --}}
    <div class="d-flex justify-content-end gap-2">
      <button type="submit" class="btn bg-accent-orange text-white">
        <i data-lucide="save" class="me-2"></i>Update Project
      </button>
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
