@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Add New Industry</h1>

  <form action="{{ route('industries.store') }}" method="POST">
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
      <label class="form-label fw-bold">Sort Order</label>
      <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Create Industry</button>
    <a href="{{ route('industries.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
