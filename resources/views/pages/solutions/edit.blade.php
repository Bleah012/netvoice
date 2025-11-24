@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Edit Solution</h1>

  <form action="{{ route('solutions.update', $solution->slug) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $solution->name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Slug</label>
      <input type="text" name="slug" class="form-control" value="{{ old('slug', $solution->slug) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Summary</label>
      <input type="text" name="summary" class="form-control" value="{{ old('summary', $solution->summary) }}">
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Body</label>
      <textarea name="body" rows="4" class="form-control">{{ old('body', $solution->body) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Active?</label>
      <input type="checkbox" name="is_active" value="1" {{ old('is_active', $solution->is_active) ? 'checked' : '' }}>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Sort Order</label>
      <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $solution->sort_order) }}">
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Update Solution</button>
    <a href="{{ route('solutions.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
