@extends('layouts.app')
@section('title', 'Create Plan')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Add New Plan</h1>

  <form action="{{ route('plans.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf

    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Slug</label>
      <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Description</label>
      <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Price (USD)</label>
      <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Sort Order</label>
      <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Create Plan</button>
    <a href="{{ route('plans.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
