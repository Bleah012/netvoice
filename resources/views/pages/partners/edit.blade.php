@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Edit Partner</h1>

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

  <form action="{{ route('partners.update', $partner) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $partner->name) }}" required>
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label fw-bold">Slug</label>
      <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $partner->slug) }}" required>
    </div>

    <div class="mb-3">
      <label for="website_url" class="form-label fw-bold">Website URL</label>
      <input type="url" name="website_url" id="website_url" class="form-control" value="{{ old('website_url', $partner->website_url) }}">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label fw-bold">Description</label>
      <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $partner->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="sort_order" class="form-label fw-bold">Sort Order</label>
      <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $partner->sort_order) }}">
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Update Partner</button>
    <a href="{{ route('partners.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
