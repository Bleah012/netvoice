@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Add New Partner</h1>

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('partners.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label fw-bold">Slug</label>
      <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
    </div>

    <div class="mb-3">
      <label for="website_url" class="form-label fw-bold">Website URL</label>
      <input type="url" name="website_url" id="website_url" class="form-control" value="{{ old('website_url') }}">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label fw-bold">Description</label>
      <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="sort_order" class="form-label fw-bold">Sort Order</label>
      <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Create Partner</button>
    <a href="{{ route('partners.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
