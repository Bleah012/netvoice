@extends('layouts.app')
@section('title', 'Edit Role')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Edit Role</h1>

  <form action="{{ route('roles.update', $role->id) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
    </div>
    <button type="submit" class="btn bg-accent-orange text-white">Update Role</button>
    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
