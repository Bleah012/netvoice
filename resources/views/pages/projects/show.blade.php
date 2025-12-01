@extends('layouts.app')
@section('title', $project->name)

@section('content')

{{-- Hero Section --}}
<section class="py-5 text-white" style="background: linear-gradient(to right, #002366, #00C853);">
  <div class="container d-flex justify-content-between align-items-center">
    <div>
      <h1 class="fw-bold mb-2 animate__animated animate__fadeInDown">{{ $project->name }}</h1>
      <p class="lead animate__animated animate__fadeInUp">
        A detailed case study of our work with {{ $project->client->name ?? 'our client' }}.
      </p>
    </div>
    <div>
      <a href="{{ route('projects.index') }}" class="btn btn-light me-2">← Back to Projects</a>
      @auth
        <a href="{{ route('projects.edit', $project->id) }}" class="btn bg-accent-orange text-white">
          <i data-lucide="edit" class="me-2"></i>Edit
        </a>
      @endauth
    </div>
  </div>
</section>

{{-- Project Image --}}
@php $img = $project->imageUrl(); @endphp
@if($img)
<section class="py-4 bg-light">
  <div class="container text-center">
    <img src="{{ $img }}"
         alt="{{ $project->name }}"
         class="img-fluid rounded shadow"
         style="max-height:400px;object-fit:cover;">
  </div>
</section>
@endif

{{-- Project Details --}}
<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8">
        <h3 class="text-primary-blue mb-3">Project Overview</h3>
        <p class="text-muted">{{ $project->description ?? 'No description provided.' }}</p>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <p><strong>Client:</strong> {{ $project->client->name ?? 'N/A' }}</p>
            <p><strong>Status:</strong> 
              <span class="badge bg-success">{{ ucfirst($project->status ?? 'pending') }}</span>
            </p>
            @if($project->started_at)
              <p><strong>Started:</strong> {{ $project->started_at->format('M d, Y') }}</p>
            @endif
            @if($project->completed_at)
              <p><strong>Completed:</strong> {{ $project->completed_at->format('M d, Y') }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Tags Section --}}
@if(is_array($project->tags) && count($project->tags) > 0)
<section class="py-5 bg-light">
  <div class="container">
    <h3 class="text-primary-blue mb-4">Project Tags</h3>
    <div class="d-flex flex-wrap gap-2">
      @foreach($project->tags as $tag)
        <span class="badge bg-light text-dark border">{{ $tag }}</span>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- CTA Section --}}
<section class="py-5 text-white" style="background: linear-gradient(to right, #002366, #00C853);">
  <div class="container text-center">
    <h2 class="mb-3">Want to start a similar project?</h2>
    <p class="lead mb-4">Partner with Netvoice Systems to bring your vision to life.</p>
    <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white px-4 py-2">
      Contact Us Today
    </a>
  </div>
</section>

@endsection
