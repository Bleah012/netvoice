@extends('layouts.app')
@section('title', 'Our Projects')

@section('content')

{{-- Hero --}}
<section class="py-5 text-white bg-primary-blue text-center">
  <div class="container">
    <h1 class="fw-bold">Our Projects</h1>
    <p class="lead text-gray-200">
      Delivering excellence across banking, education, manufacturing, NGO, and commercial sectors throughout Kenya.
    </p>
  </div>
</section>

{{-- Filter Bar --}}
<section class="py-4 bg-white border-bottom">
  <div class="container text-center">
    <div class="btn-group">
      @foreach($categories as $cat)
        <a href="{{ route('projects.index', ['category' => $cat]) }}"
           class="btn btn-sm {{ $activeCategory === $cat ? 'btn-accent-orange text-white' : 'btn-outline-secondary' }}">
          {{ $cat }}
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- Project Grid --}}
<section class="py-5 bg-light">
  <div class="container">

    {{-- Admin-only Add Project button --}}
    @auth
      @can('manage-projects')
        <div class="mb-4 text-end">
          <a href="{{ route('projects.create') }}" class="btn bg-accent-orange text-white">
            <i data-lucide="plus" class="me-2"></i> Add Project
          </a>
        </div>
      @endcan
    @endauth

    <div class="row g-4">
      @forelse($projects as $project)
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm border-0">

            {{-- Image --}}
            @php $img = $project->imageUrl(); @endphp
            @if($img)
              <img src="{{ $img }}" alt="{{ $project->name }}"
                   class="card-img-top" style="height:200px;object-fit:cover;">
            @else
              <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                <span class="text-muted small">No image available</span>
              </div>
            @endif

            {{-- Content --}}
            <div class="card-body d-flex flex-column">
              <h5 class="text-primary-blue">{{ $project->name }}</h5>
              <p class="text-muted small mb-2">{{ $project->client->name ?? 'N/A' }}</p>
              <span class="badge bg-success mb-3">{{ ucfirst($project->status) }}</span>
              <p class="text-muted grow">{{ Str::limit($project->description, 100) }}</p>

              {{-- Tags --}}
              @if($project->tags)
                <div class="mb-2">
                  @foreach($project->tags as $tag)
                    <span class="badge bg-light text-dark border">{{ $tag }}</span>
                  @endforeach
                </div>
              @endif

              {{-- CTA --}}
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm bg-accent-orange text-white">
                  View Case Study
                </a>

                {{-- Edit + Delete buttons for admins --}}
                @auth
                  @can('manage-projects')
                    <div class="d-flex gap-2">
                      <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-outline-secondary">
                        <i data-lucide="edit" class="me-1"></i> Edit
                      </a>

                      <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          <i data-lucide="trash-2" class="me-1"></i> Delete
                        </button>
                      </form>
                    </div>
                  @endcan
                @endauth
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center text-muted">No projects found in this category.</div>
      @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
      {{ $projects->links() }}
    </div>
  </div>
</section>

{{-- Stats Footer --}}
<section class="py-5 bg-primary-blue text-white text-center">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-3"><h3 class="fw-bold">500+</h3><p>Projects Completed</p></div>
      <div class="col-md-3"><h3 class="fw-bold">200+</h3><p>Enterprises Served</p></div>
      <div class="col-md-3"><h3 class="fw-bold">98%</h3><p>Client Satisfaction</p></div>
      <div class="col-md-3"><h3 class="fw-bold">24/7</h3><p>Support Available</p></div>
    </div>
  </div>
</section>

@endsection
