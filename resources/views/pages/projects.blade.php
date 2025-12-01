@extends('layouts.app')
@section('title', 'Manage Projects')

@section('content')

<section class="py-5 bg-white">
  <div class="container">
    <h1 class="mb-4 text-primary-blue">Project Management</h1>
    <p class="text-muted mb-5">
      Manage all Netvoice Systems projects — view portfolio, create new entries, edit existing ones, or review case studies.
    </p>

    {{-- Filter Bar --}}
    @isset($categories)
      <div class="mb-4 text-center">
        <div class="btn-group">
          @foreach($categories as $cat)
            <a href="{{ route('projects.index', ['category' => $cat]) }}"
               class="btn btn-sm {{ $activeCategory === $cat ? 'btn-accent-orange text-white' : 'btn-outline-secondary' }}">
              {{ $cat }}
            </a>
          @endforeach
        </div>
      </div>
    @endisset

    {{-- Navigation Tabs --}}
    <ul class="nav nav-tabs mb-4" id="projectTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="index-tab" data-bs-toggle="tab" data-bs-target="#index" type="button" role="tab">
          <i data-lucide="list" class="me-2 w-4 h-4"></i> All Projects
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="create-tab" data-bs-toggle="tab" data-bs-target="#create" type="button" role="tab">
          <i data-lucide="plus-circle" class="me-2 w-4 h-4"></i> Create Project
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit" type="button" role="tab">
          <i data-lucide="edit" class="me-2 w-4 h-4"></i> Edit Project
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="show-tab" data-bs-toggle="tab" data-bs-target="#show" type="button" role="tab">
          <i data-lucide="eye" class="me-2 w-4 h-4"></i> View Project
        </button>
      </li>
    </ul>

    {{-- Tab Content --}}
    <div class="tab-content" id="projectTabsContent">
      <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="index-tab">
        @include('pages.projects.index')
      </div>
      <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">
        @include('pages.projects.create')
      </div>
      <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
        @include('pages.projects.edit')
      </div>
      <div class="tab-pane fade" id="show" role="tabpanel" aria-labelledby="show-tab">
        @include('pages.projects.show')
      </div>
    </div>
  </div>
</section>

@endsection
