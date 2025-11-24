@extends('layouts.app')
@section('title', $client->name)

@section('content')
<div class="container py-5">

  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="text-primary-blue fw-bold mb-0">{{ $client->name }}</h1>
    <div>
      <a href="{{ route('clients.edit', $client->slug) }}" class="btn btn-outline-primary me-2">Edit</a>
      <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>
  </div>

  {{-- Contact info --}}
  <div class="row g-4 mb-4">
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="text-primary-blue fw-bold mb-3">Contact</h5>
          <p class="mb-1"><strong>Email:</strong> <span class="text-muted">{{ $client->contact_email }}</span></p>
          <p class="mb-0"><strong>Phone:</strong> <span class="text-muted">{{ $client->contact_phone }}</span></p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="text-primary-blue fw-bold mb-3">Notes</h5>
          <p class="text-muted mb-0">{!! nl2br(e($client->notes)) !!}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- Related projects --}}
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5 class="text-primary-blue fw-bold mb-3">Projects</h5>
      @if($client->projects->count())
        <ul class="list-group list-group-flush">
          @foreach($client->projects as $project)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="fw-semibold">{{ $project->name }}</span>
              <a href="{{ route('projects.show', $project->slug ?? $project->id) }}" class="btn btn-sm btn-outline-primary">View</a>
            </li>
          @endforeach
        </ul>
      @else
        <p class="text-muted mb-0">No projects associated yet.</p>
      @endif
    </div>
  </div>

  {{-- Related media --}}
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="text-primary-blue fw-bold mb-3">Media</h5>
      @if($client->media->count())
        <div class="row g-3">
          @foreach($client->media as $item)
            <div class="col-md-3">
              <div class="border rounded overflow-hidden">
                <img src="{{ $item->url }}" alt="{{ $item->alt ?? $client->name }}" class="img-fluid">
              </div>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-muted mb-0">No media uploaded.</p>
      @endif
    </div>
  </div>

</div>
@endsection
