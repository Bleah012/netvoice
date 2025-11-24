@extends('layouts.app')
@section('title', $project->name)

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary-blue">{{ $project->name }}</h1>
    <div>
      <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-primary me-2">Edit</a>
      <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>
  </div>

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p><strong>Client:</strong> {{ $project->client->name ?? 'N/A' }}</p>
      <p><strong>Status:</strong> {{ ucfirst($project->status ?? 'pending') }}</p>
      <p><strong>Description:</strong> {{ $project->description ?? 'No description provided.' }}</p>
    </div>
  </div>
</div>
@endsection
